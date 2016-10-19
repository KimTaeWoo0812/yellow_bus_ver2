package net.computeering.newschoolbus.MapFragmentPackage;

import android.Manifest;
import android.app.AlertDialog;
import android.app.Notification;
import android.app.NotificationManager;
import android.app.PendingIntent;
import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.graphics.Color;
import android.location.Criteria;
import android.location.Location;
import android.location.LocationListener;
import android.location.LocationManager;
import android.os.AsyncTask;
import android.os.Bundle;
import android.support.v4.app.ActivityCompat;
import android.support.v4.app.Fragment;
import android.support.v4.app.FragmentManager;
import android.support.v4.app.FragmentTransaction;
import android.support.v4.content.ContextCompat;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import com.google.android.gms.common.GooglePlayServicesUtil;
import com.google.android.gms.maps.CameraUpdateFactory;
import com.google.android.gms.maps.GoogleMap;
import com.google.android.gms.maps.OnMapReadyCallback;
import com.google.android.gms.maps.SupportMapFragment;
import com.google.android.gms.maps.model.BitmapDescriptorFactory;
import com.google.android.gms.maps.model.LatLng;
import com.google.android.gms.maps.model.Marker;
import com.google.android.gms.maps.model.MarkerOptions;
import com.google.android.gms.maps.model.PolylineOptions;

import net.computeering.newschoolbus.CustomPreferences;
import net.computeering.newschoolbus.DataPackage.SchoolData;
import net.computeering.newschoolbus.MapFragmentPackage.TranceCoordPackage.CoordPoint;
import net.computeering.newschoolbus.MapFragmentPackage.TranceCoordPackage.transform;
import net.computeering.newschoolbus.R;
import net.computeering.newschoolbus.SchoolManagePackage.PermissionUtils;
import net.computeering.newschoolbus.TCP.TCP_SC;
import net.computeering.newschoolbus.TCP.TCP_Socket;
import net.computeering.newschoolbus.UDP.UDP_SC;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;
import org.jsoup.Jsoup;

import java.net.DatagramSocket;
import java.net.InetAddress;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Date;
import java.util.HashMap;
import java.util.Iterator;
import java.util.Set;


/**
 * A simple {@link Fragment} subclass.
 */
public class MapFragment extends Fragment implements LocationListener, OnMapReadyCallback, GoogleMap.OnMyLocationButtonClickListener, GoogleMap.OnMapClickListener {
    public FragmentManager manager;
    public FragmentTransaction transaction;
    public SupportMapFragment fragment;
    public static GoogleMap map;
    private static final int LOCATION_PERMISSION_REQUEST_CODE = 1;
    double lat = 0;
    double lon = 0;
    String keyName = "";
    private static boolean stopThread = false;
    MarkersThread_For_Student thread_student;
    HashMap<String, LatLng> latlng = new HashMap<String, LatLng>();
    Iterator iterator2;
    Set key;
    boolean flag = true;
    TextView text_restTime;

    public final int delayTime = 4300;
    private long start_btn_refresh;
    private long start_btn_exp;
    private long end_btn_refresh;
    private long end_btn_exp;

    private String selected_marker_name = "0";
    private LatLng selected_marker_latlng;
    private LatLng myLoc;
    private LatLng schoolLoc;
    private boolean didNotNoti = true;
    private boolean dialog_cancel_bool = false;
    //    private boolean zoomFirst = true;
    private boolean makeingMyPosition_usingFinger = false;
    private boolean isDoneSaveRoute = false; //예상 최단 경로 그리기

    Button btn_refresh;
    Button btn_exp;
    Button btn_choose;
    Button btn_drowRoute;

    private Progress_forLogingGPS progress_forLogingGPS;
    CustomPreferences pref;
    private String provider;
    private LocationManager locationManager;
    boolean hasLoc = false;
    ArrayList<LatLng> routeList;
    boolean ClickScanGPS = false; //GPS 탐색 시작

    public MapFragment() {
        progress_forLogingGPS = new Progress_forLogingGPS();
        // Required empty public constructor
    }

    @Override
    public void onViewCreated(View view, Bundle savedInstanceState) {
        super.onViewCreated(view, savedInstanceState);
        Log.e("UDP_ 시작  :  ", " ");

        text_restTime = (TextView) getActivity().findViewById(R.id.text_restTime); //

        start_btn_refresh = System.currentTimeMillis();
        start_btn_exp = System.currentTimeMillis();
        end_btn_refresh = System.currentTimeMillis();
        end_btn_exp = System.currentTimeMillis();

        start_btn_refresh -= 5000;
        start_btn_exp -= 5000;

        btn_refresh = (Button) getActivity().findViewById(R.id.btn_refresh);
        btn_exp = (Button) getActivity().findViewById(R.id.btn_exp);
        btn_choose = (Button) getActivity().findViewById(R.id.btn_choose);
        btn_drowRoute = (Button) getActivity().findViewById(R.id.btn_drowRoute);

        btn_refresh.setOnClickListener(new View.OnClickListener() {//!!!
            public void onClick(View v) {
                if (!SchoolData.boolHasCar) {
                    //운행중인 차량이 없다면
                    Toast.makeText(getActivity(), "현재 운행중인 차량이 없습니다.", Toast.LENGTH_SHORT).show();
                    return;
                }
                if (end_btn_refresh - start_btn_refresh > delayTime) {
                    start_btn_refresh = System.currentTimeMillis();
                    end_btn_refresh = System.currentTimeMillis();
                    (new SetList()).execute(new String[]{"1"});
                    //ServerCheck.showLoading(getActivity());
                    Toast.makeText(getActivity(), "차량 위치를 받아옵니다", Toast.LENGTH_SHORT).show();
                }
                end_btn_refresh = System.currentTimeMillis();
                Toast.makeText(getActivity(), ((end_btn_refresh - start_btn_refresh - delayTime) / 1000) * -1 + "초 후 시도해주세요 ^-^", Toast.LENGTH_SHORT).show();
            }
        });
        btn_exp.setOnClickListener(new View.OnClickListener() {
            public void onClick(View v) {
                if (!SchoolData.boolHasCar) {
                    //운행중인 차량이 없다면
//                    Toast.makeText(getActivity(), "현재 운행중인 차량이 없습니다.", Toast.LENGTH_SHORT).show();
                }
                if (selected_marker_name.equals("0")) {
//                    Toast.makeText(getActivity(), "차량을 선택해 주세요!", Toast.LENGTH_SHORT).show();
                }
                //방식 정하기
                DialogSimple();
                isDoneSaveRoute = false;
            }
        });
        btn_choose.setOnClickListener(new View.OnClickListener() {
            public void onClick(View v) {

                btn_exp.setVisibility(View.VISIBLE);
                btn_refresh.setVisibility(View.VISIBLE);
                btn_drowRoute.setVisibility(View.VISIBLE);
                btn_choose.setVisibility(View.INVISIBLE);
                hasLoc = true;
                makeingMyPosition_usingFinger = false;
                isDoneSaveRoute = true;
            }
        });
        btn_drowRoute.setOnClickListener(new View.OnClickListener() {
            public void onClick(View v) {
                if (!SchoolData.boolHasCar || keyName.equals("")) {
                    Toast.makeText(getActivity(), "현재 운행중인 차량이 없습니다.", Toast.LENGTH_SHORT).show();
                    return;
                }
                if (selected_marker_name.equals("0")) {
                    Toast.makeText(getActivity(), "차량을 선택해 주세요!", Toast.LENGTH_SHORT).show();
                    return;
                }
                DrowRoute(myLoc.latitude,
                        myLoc.longitude,
                        latlng.get(keyName).latitude,
                        latlng.get(keyName).longitude);
            }
        });
    }

    public void DialogSimple() {
        AlertDialog.Builder alt_bld = new AlertDialog.Builder(getActivity());
        alt_bld.setMessage("위치 설정 방식 설정").setCancelable(
                false).setPositiveButton("현재 위치로(GPS)",
                new DialogInterface.OnClickListener() {
                    public void onClick(DialogInterface dialog, int id) {
                        dialog.cancel();
                        GetLoc_useing_GPS();
                    }
                }).setNegativeButton("지도에서 직접 설정",
                new DialogInterface.OnClickListener() {
                    public void onClick(DialogInterface dialog, int id) {
                        btn_exp.setVisibility(View.INVISIBLE);
                        btn_refresh.setVisibility(View.INVISIBLE);
                        btn_drowRoute.setVisibility(View.INVISIBLE);
                        btn_choose.setVisibility(View.VISIBLE);

                        GetLoc_useing_onceFinger();

                        dialog.cancel();

                    }
                });
        AlertDialog alert = alt_bld.create();
        // Title for AlertDialog
        alert.setTitle("내 위치 설정");
        // Icon for AlertDialog
        alert.setIcon(R.drawable.logo);
        alert.setCancelable(true);
        alert.show();
    }

    @Override
    public void onMapClick(LatLng latLng) {
//        Log.i("###onMapClick ",""+makeingMyPosition_usingFinger+"  "+latLng.latitude+"   "+latLng.longitude);

        if (makeingMyPosition_usingFinger) {
            myLoc = latLng;
            map.addMarker(new MarkerOptions()
                    .position(myLoc)
                    .title(SchoolData.schoolName)
                            //.snippet(temp[1])
                    .icon(BitmapDescriptorFactory.fromResource(R.drawable.my_position)));

            pref.put(pref.LOC_LAT, Double.toString(myLoc.latitude));
            pref.put(pref.LOC_LON, Double.toString(myLoc.longitude));
            pref.put(pref.LOC_HASLOC, "TRUE");
        }

    }

    private void GetLoc_useing_onceFinger() {
        makeingMyPosition_usingFinger = true;
    }

    private void GetLoc_useing_GPS() {
//        if (end_btn_exp - start_btn_exp > delayTimeForExp) {
        //GPS를 켜라

        onGPS();
        if (dialog_cancel_bool) { //취소 눌렀을때
            dialog_cancel_bool = false;
            return;
        }
        ClickScanGPS = true;

//
//        double t_start_Time = System.currentTimeMillis();
//        double t_end_Time = System.currentTimeMillis();
//
//        boolean outCheck = true;
//
//        myLoc = new LatLng(0, 0);
//        progress_forLogingGPS.isCancle = false;
//        progress_forLogingGPS.showLoading(getActivity());
//        for (; t_start_Time + 15000 > t_end_Time; ) {
//            if (myLoc.latitude != 0) {
//                outCheck = false;
//                break;
//            }
//            if (progress_forLogingGPS.isCancle) { //취소 눌렀으면
//                break;
//            }
//            t_end_Time = System.currentTimeMillis();
//            try {
//                Thread.sleep(25);
//            } catch (InterruptedException e) {
//                e.printStackTrace();
//            }
//        }
//        progress_forLogingGPS.hideLoading();
//        if (outCheck) {
//            return;
//        }
//        outCheck = false;
//
//
//
//
//        if (myLoc.latitude == 0) {
//            Toast.makeText(getActivity(), "위치 인식 실패.. \n주변이 트인 곳으로 이동하세요.", Toast.LENGTH_SHORT).show();
//        } else {
//            pref.put(pref.LOC_LAT, Double.toString(myLoc.latitude));
//            pref.put(pref.LOC_LON, Double.toString(myLoc.longitude));
//            pref.put(pref.LOC_HASLOC, "TRUE");
//            hasLoc = true;
//
//            GetCostTime(myLoc.latitude,
//                    myLoc.longitude,
//                    latlng.get(keyName).latitude,
//                    latlng.get(keyName).longitude);
//            isDoneSaveRoute = true;
//        }
    }

    @Override
    public void onStart() {
        super.onStart();
        myLoc = new LatLng(0, 0);
//        Log.i("!!!onStart ", "!!!");
        if (pref.getValue(pref.LOC_HASLOC, "").equals("TRUE"))
            myLoc = new LatLng(Double.valueOf(pref.getValue(pref.LOC_LAT, "")).doubleValue(), Double.valueOf(pref.getValue(pref.LOC_LON, "")).doubleValue());

//        double x = 37.5;
//        double y = 127.01;
//        myLoc = new LatLng(x,y);
        schoolLoc = new LatLng(Double.parseDouble(SchoolData.lat), Double.parseDouble(SchoolData.lon));
        //ll = new LatLng(37.5,127);

    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.fragment_map, container, false);

        pref = new CustomPreferences(getActivity());
        manager = getFragmentManager();
        transaction = manager.beginTransaction();
        fragment = new SupportMapFragment();
        transaction.add(R.id.map, fragment);
        transaction.commit();

        fragment.getMapAsync(this);
        return view;
    }

    @Override
    public void onMapReady(GoogleMap _map) {
//        Log.i("!!!onMapReady ", "!!!");

        if (pref.getValue(pref.LOC_HAS_CARNAME, "").equals("TRUE")) {
            selected_marker_name = pref.getValue(pref.LOC_CARNAME, "");
        }

//        Log.e("UDP_ 레디 :  ", " ");
        this.map = _map;

        GooglePlayServicesUtil.isGooglePlayServicesAvailable(getActivity());
        locationManager = (LocationManager) getActivity().getSystemService(Context.LOCATION_SERVICE);
        if (ActivityCompat.checkSelfPermission(getActivity(), Manifest.permission.ACCESS_FINE_LOCATION) != PackageManager.PERMISSION_GRANTED && ActivityCompat.checkSelfPermission(getActivity(), Manifest.permission.ACCESS_COARSE_LOCATION) != PackageManager.PERMISSION_GRANTED) {
            // TODO: Consider calling
            //    ActivityCompat#requestPermissions
            // here to request the missing permissions, and then overriding
            //   public void onRequestPermissionsResult(int requestCode, String[] permissions,
            //                                          int[] grantResults)
            // to handle the case where the user grants the permission. See the documentation
            // for ActivityCompat#requestPermissions for more details.
            Toast.makeText(getActivity(), "이 기기는 GPS 기능을 사용할 수 없습니다.", Toast.LENGTH_SHORT).show();
            return;
        }
//        locationManager.requestLocationUpdates(LocationManager.GPS_PROVIDER, 1000, 0, this);

        map.setOnMyLocationButtonClickListener(this);
        //myAddMarker(lat, lon, map);
        //if(SchoolData.role.equals("학생"))
        enableMyLocation();
        map.setOnMapClickListener(this);

        map.setOnMarkerClickListener(new GoogleMap.OnMarkerClickListener() {

            public boolean onMarkerClick(Marker marker) {
                if (!marker.getTitle().equals(SchoolData.schoolName)) {
                    selected_marker_name = marker.getTitle();
                    pref.put(pref.LOC_CARNAME, marker.getTitle());
                    pref.put(pref.LOC_HAS_CARNAME, "TRUE");
                    selected_marker_latlng = marker.getPosition();
                    marker.setIcon(BitmapDescriptorFactory.fromResource(R.drawable.logo_selected));
                }
//                String text = "[마커 클릭 이벤트] latitude ="
//                        + marker.getPosition().latitude + ", longitude ="
//                        + marker.getPosition().longitude;
//                Toast.makeText(getActivity(), text, Toast.LENGTH_LONG)
//                        .show();
                return false;
            }
        });


        map.addMarker(new MarkerOptions()
                .position(schoolLoc)
                .title(SchoolData.schoolName)
                        //.snippet(temp[1])
                .icon(BitmapDescriptorFactory.fromResource(R.drawable.school_icon)));
        {
            if (myLoc.latitude != 0)
                map.animateCamera(CameraUpdateFactory.newLatLngZoom(
                        new LatLng(myLoc.latitude, myLoc.longitude), 13));
            else
                map.animateCamera(CameraUpdateFactory.newLatLngZoom(
                        new LatLng(schoolLoc.latitude,schoolLoc.longitude), 13));
        }


        if (SchoolData.boolHasCar) {
            text_restTime.setText("");
            thread_student = new MarkersThread_For_Student(map);
            thread_student.start();
        }
    }

    private void enableMyLocation() {
        if (ContextCompat.checkSelfPermission(getActivity(), Manifest.permission.ACCESS_FINE_LOCATION)
                != PackageManager.PERMISSION_GRANTED) {
            // Permission to access the location is missing.
            PermissionUtils.requestPermission((AppCompatActivity) getActivity(), LOCATION_PERMISSION_REQUEST_CODE,
                    Manifest.permission.ACCESS_FINE_LOCATION, true);
        } else if (map != null) {
            // Access to the location has been granted to the app.
            map.setMyLocationEnabled(true);
        }
    }

    @Override
    public boolean onMyLocationButtonClick() {
        return false;
    }

    @Override
    public void onLocationChanged(Location location) {
//        Log.i("### onLocat", location.getLatitude() + "   " + location.getLongitude());

        Toast.makeText(getActivity(), location.getLatitude() + "   " + location.getLongitude(), Toast.LENGTH_SHORT).show();
        if (ClickScanGPS) {
            if (location.getLatitude() == 0)
                return;
            myLoc = new LatLng(location.getLatitude(), location.getLongitude());

            pref.put(pref.LOC_LAT, Double.toString(myLoc.latitude));
            pref.put(pref.LOC_LON, Double.toString(myLoc.longitude));
            pref.put(pref.LOC_HASLOC, "TRUE");
            hasLoc = true;
            isDoneSaveRoute = true;
            ClickScanGPS = false;

            map.addMarker(new MarkerOptions()
                    .position(myLoc)
                    .title(SchoolData.schoolName)
                            //.snippet(temp[1])
                    .icon(BitmapDescriptorFactory.fromResource(R.drawable.my_position)));
            if (!SchoolData.boolHasCar || keyName.equals("")) {
                return;
            }
            if (selected_marker_name.equals("0")) {
                return;
            }
            GetCostTime(myLoc.latitude,
                    myLoc.longitude,
                    latlng.get(keyName).latitude,
                    latlng.get(keyName).longitude);
        }


    }

    @Override
    public void onProviderDisabled(String provider) {
    }

    @Override
    public void onProviderEnabled(String provider) {
    }

    @Override
    public void onStatusChanged(String provider, int status, Bundle extras) {
    }


    class MarkersThread_For_Student extends Thread {

        long start_parsing_time = System.currentTimeMillis();
        long end_parsing_time = System.currentTimeMillis();
        final long DELAY_TIME = 15000;

        public MarkersThread_For_Student(GoogleMap map) {
            String temp = pref.getValue(pref.LOC_HASLOC, ""); //이거 내 위치 있냐는 건데 이거 체크를 더 뒤에서 해야댐
            if (temp.equals("TRUE"))
                hasLoc = true;
            else
                hasLoc = false;
        }
        //map에 받아온 위치 넣으면 된다,

        @Override
        public void run() {
            {

            }

//            Log.e("UDP_ 고!  :  ", " ");
            DatagramSocket socket = null;
            //host = UDP_SC.host;
            //InetAddress.getByName("192.168.43.30");

            for (int i = 0; i < SchoolData.carList.size(); i++) {
                UDP_SC.SendMsg("START" + UDP_SC._del + SchoolData.carList.get(i));
//                Log.e("Map:  ", SchoolData.carList.get(i));
//                Log.e("Map: -> ", UDP_SC._del);
                try {
                    Thread.sleep(70);
                } catch (InterruptedException e) {
                    e.printStackTrace();
                }
            }


            String msg = "";
            //DatagramPacket sendPacket, receivePacket;
            while (!stopThread && !SchoolData.MapFragment_stopThread) {
                try {
                    msg = UDP_SC.GetMsg();
                    try {

                        String msgs[] = msg.split(UDP_SC._del);

                        keyName = msgs[0];
                        lat = Double.valueOf(msgs[1]);
                        lon = Double.valueOf(msgs[2]);
//                        Log.e("Map:  ", keyName + "  " + lat + "  " + lon);
                    } catch (java.lang.ArrayIndexOutOfBoundsException e) {
                        continue;
                    }
                    //Toast.makeText(getContext(), lat + "  " + lon, Toast.LENGTH_SHORT).show();
                    //map.addMarker(new MarkerOptions().position(new LatLng(lat, lon)).title(keyName));

                    LatLng MELBOURNE = new LatLng(lat, lon);
                    latlng.put(keyName, MELBOURNE);


                    getActivity().runOnUiThread(new Runnable() {
                        @Override
                        public void run() {
                            map.clear();

//                            Log.e("Map:  ", keyName + "  " + lat + "  " + lon);

                            if (hasLoc) {
                                map.addMarker(new MarkerOptions()
                                        .position(myLoc)
                                        .title(SchoolData.schoolName)
                                                //.snippet(temp[1])
                                        .icon(BitmapDescriptorFactory.fromResource(R.drawable.my_position)));
                            }

//                            Log.e("Map schoolLoc:  ", schoolLoc.latitude + "  " + schoolLoc.longitude + "  " + SchoolData.schoolName);
                            map.addMarker(new MarkerOptions()
                                    .position(schoolLoc)
                                    .title(SchoolData.schoolName)
                                            //.snippet(temp[1])
                                    .icon(BitmapDescriptorFactory.fromResource(R.drawable.school_icon)));

                            key = latlng.keySet();
                            for (iterator2 = key.iterator(); iterator2.hasNext(); ) {
                                try {
                                    keyName = (String) iterator2.next();
                                } catch (java.util.ConcurrentModificationException e) {
                                    System.err.println("익셉션");
                                    break;
                                }
//                                Log.i("@@ 시간 갱신 체크1", "@@ " + selected_marker_name);
                                if (selected_marker_name.equals(keyName)) { //선택된 마커라면

                                    map.addMarker(new MarkerOptions()
                                            .position(latlng.get(keyName))
                                            .title(keyName)
                                                    //.snippet(temp[1])
                                            .icon(BitmapDescriptorFactory.fromResource(R.drawable.logo_selected)));
                                    if (isDoneSaveRoute) { //경로 그리기
                                        //경로 모든 x,y에서 내 위치 만큼의 오차를 빼줘야댐

                                        try {
                                            ArrayList<LatLng> newRouteList = new ArrayList<LatLng>();

                                            double gapX = 0;
                                            double gapY = 0;
                                            gapX = myLoc.latitude - routeList.get(0).latitude;
                                            gapY = myLoc.longitude - routeList.get(0).longitude;

                                            for (int i = 0; i < routeList.size(); i++) {
                                                if (gapX >= 0) {
                                                    if (gapY >= 0) {
                                                        newRouteList.add(new LatLng(routeList.get(i).latitude + gapX, routeList.get(i).longitude + gapY));
                                                    } else
                                                        newRouteList.add(new LatLng(routeList.get(i).latitude + gapX, routeList.get(i).longitude - gapY));
                                                } else {
                                                    if (gapY >= 0) {
                                                        newRouteList.add(new LatLng(routeList.get(i).latitude - gapX, routeList.get(i).longitude + gapY));
                                                    } else
                                                        newRouteList.add(new LatLng(routeList.get(i).latitude - gapX, routeList.get(i).longitude - gapY));
                                                }
                                            }
                                            for (int i = 1; i < routeList.size(); i++) {
//                                            Log.i("####!# from","####!# "+routeList.get(i - 1).latitude+"   "+ routeList.get(i - 1).longitude+"  뒤:  "+routeList.get(i).latitude+"   "+ routeList.get(i).longitude);
//                                                Log.i("####!# to", "####!# " + newRouteList.get(i - 1).latitude + "   " + newRouteList.get(i - 1).longitude + "  뒤:  " + newRouteList.get(i).latitude + "   " + newRouteList.get(i).longitude);
                                                map.addPolyline(new PolylineOptions().add(newRouteList.get(i - 1), newRouteList.get(i)).width(7).color(Color.RED));

                                            }
                                        } catch (IndexOutOfBoundsException e) {
                                            e.printStackTrace();
                                        }
                                    }

//                                    Log.i("@@ 시간 갱신 체크2", "@@ " + myLoc.latitude + "  " + myLoc.longitude);
                                    if (myLoc.latitude != 0) {
                                        //15초에 한번 조회
//                                        Log.i("@@ 시간 갱신 체크3", "@@ " + start_parsing_time + DELAY_TIME + "  " + end_parsing_time);
                                        if (start_parsing_time + DELAY_TIME < end_parsing_time) {

                                            GetCostTime(myLoc.latitude,
                                                    myLoc.longitude,
                                                    latlng.get(keyName).latitude,
                                                    latlng.get(keyName).longitude);
                                            //map.addPolyline(new PolylineOptions().add(latlng.get(keyName), myLoc).width(5).color(Color.RED));

                                            start_parsing_time = System.currentTimeMillis();
                                        }
                                        end_parsing_time = System.currentTimeMillis();
                                    }

                                } else {
//                                    Log.e("Map 차량 위치:  ", latlng.get(keyName).latitude + "  " + latlng.get(keyName).longitude + "  " + keyName);
                                    map.addMarker(new MarkerOptions()
                                            .position(latlng.get(keyName))
                                            .title(keyName)
                                                    //.snippet(temp[1])
                                            .icon(BitmapDescriptorFactory.fromResource(R.drawable.logo_small)));
                                }
                            }
//                            if(flag) {
//                                LatLng latlon = new LatLng(SchoolData.lat0, SchoolData.lng0);
//                                MapFragment.map.moveCamera(CameraUpdateFactory.newLatLngZoom(latlon, 15));//초기 위치...수정필요
//                                flag = false;
//                            }
                        }
                    });

                } catch (NullPointerException e) {
                    //stopThread = true;
//                    Log.e("익셉션", "맵 스레드 종료");
                }
                try {
                    Thread.sleep(400);
                } catch (InterruptedException e) {
                    e.printStackTrace();
                }
            }

//            for (int i = 0; i < SchoolData.carList.size(); i++) {
////                msg = "STOP" + UDP_SC._del + SchoolData.carList.get(i);
////                byte[] dummyData = new byte[256];
////
////                Log.e("UDP_보내는 메시지   :  ", msg);
////                dummyData = msg.getBytes();
////                Log.e("UDP_보내는 메시지  2 :  ", " " + dummyData);
////                sendPacket = new DatagramPacket(dummyData, dummyData.length, host, port);
////                try {
////                    socket.send(sendPacket);
////                } catch (IOException e) {
////                    e.printStackTrace();
////                }
//
//                UDP_SC.SendMsg("STOP" + UDP_SC._del + SchoolData.carList.get(i));
//                try {
//                    Thread.sleep(70);
//                } catch (InterruptedException e) {
//                    e.printStackTrace();
//                }
//            }

            try {
                //UDP_SC.CloseChannel();
            } catch (Exception e) {
                e.printStackTrace();
            }


        }
    }

    public class SetList extends AsyncTask<String, Void, String> {
        String msg = "";

        @Override
        protected void onPreExecute() {
            super.onPreExecute();
        }

        @Override
        protected String doInBackground(String... params) {
            String type = params[0];
            if (type.compareTo("1") == 0) {
                for (int i = 0; i < SchoolData.carList.size(); i++) {
                    UDP_SC.SendMsg("START" + UDP_SC._del + SchoolData.carList.get(i));
//                    Log.e("Map:  ", SchoolData.carList.get(i));
//                    Log.e("Map: -> ", UDP_SC._del);
                    try {
                        Thread.sleep(50);
                    } catch (InterruptedException e) {
                        e.printStackTrace();
                    }
                }
                //return "1";
                //} else if (type.compareTo("2") == 0) {
                TCP_Socket.socket = TCP_Socket.shared();
                SchoolData.carList.clear();

                msg = "S_CAR" + TCP_SC._del + SchoolData.schoolName + TCP_SC._del;
                TCP_Socket.socket.SendMsg(msg);

                for (; ; ) {
                    msg = TCP_Socket.socket.GetMsg();
                    if (msg.equals("100"))
                        return "100";
                    boolean out = false;
//                    Log.e("Main_test:  ", msg + "  ");

//                for(int j=0;j<= TCP_Que.top;j++){
//                    Log.e("Main_test for ", TCP_Que.Queue[j]);
//                }
                    String MSGS[] = msg.split(TCP_SC._endDel);

                    for (int i = 0; i < MSGS.length; i++) {

                        String msgs[] = MSGS[i].split(TCP_SC._del);
//                        Log.e("Main_test", "55555");
                        if (i == 0) {
                            //차 받기
                            if (!msgs[1].equals("0"))
                                SchoolData.carList.add(SchoolData.schoolName + "!" + msgs[1]);
                            else {
                                out = true;
                            }
                        } else {
                            if (!msgs[0].equals("0"))
                                SchoolData.carList.add(SchoolData.schoolName + "!" + msgs[0]);
                            else {
                                out = true;
                            }
                        }

                    }
                    if (out)
                        break;
                }

                //ServerCheck.hideLoading();
                if (SchoolData.carList.size() == 0) {
                    SchoolData.boolHasCar = false;
                }
                else {
                    thread_student = new MarkersThread_For_Student(map);
                    thread_student.start();
                    SchoolData.boolHasCar = true;
                }
            }

            return "2";
        }

        @Override
        protected void onPostExecute(String result) {
            super.onPostExecute(result);
            if (result.compareTo("1") == 0) {

            } else if (result.compareTo("2") == 0) {
                TCP_Socket.socket.CloseSocket();

//                Log.i("###", "  ## # " + Integer.toString(SchoolData.carList.size()));
                if (SchoolData.carList.size() == 0) {
                    text_restTime.setText("운행중인 차량이 없습니다.");
                }
                else {
                    text_restTime.setText("");
                }
            }


        }
    }

    static String getDate() {
        long time = System.currentTimeMillis();
        SimpleDateFormat f = new SimpleDateFormat("yyyy/MM/dd");
        return f.format(new Date(time));
    }

    public void Notification() {
        PendingIntent pendingIntent = PendingIntent.getActivity(getActivity(), 0, new Intent(getActivity(), MapFragment.class), PendingIntent.FLAG_UPDATE_CURRENT);
        Notification.Builder builder = new Notification.Builder(getActivity());
        // 작은 아이콘 이미지.
        builder.setSmallIcon(R.mipmap.ic_launcher);
        // 알림이 출력될 때 상단에 나오는 문구.
        builder.setTicker(SchoolData.schoolName + " 차량 도착 약 10분 전!");
        // 알림 출력 시간.
        builder.setWhen(System.currentTimeMillis());
        // 알림 제목.
        builder.setContentTitle(SchoolData.schoolName + " 차량 도착 약 10분 전!");
        // 프로그래스 바.
        builder.setProgress(100, 50, false);
        // 알림 내용.
        builder.setContentText(SchoolData.schoolName + "어린이집 차량 도착 약 10분 전!");
        // 알림시 사운드, 진동, 불빛을 설정 가능.
        builder.setDefaults(Notification.DEFAULT_SOUND | Notification.DEFAULT_VIBRATE);
        // 알림 터치시 반응.
        builder.setContentIntent(pendingIntent);
        // 알림 터치시 반응 후 알림 삭제 여부.
        builder.setAutoCancel(true);
        // 우선순위.
        //builder.setPriority(NotificationCompat.PRIORITY_MAX);
        // 행동 최대3개 등록 가능.
//        builder.addAction(R.mipmap.ic_launcher, "Show", pendingIntent);
//        builder.addAction(R.mipmap.ic_launcher, "Hide", pendingIntent);
//        builder.addAction(R.mipmap.ic_launcher, "Remove", pendingIntent);
        // 고유ID로 알림을 생성.
        NotificationManager nm = (NotificationManager) getActivity().getSystemService(Context.NOTIFICATION_SERVICE);
        nm.notify(0425, builder.build());
    }

    public void onGPS() {

        String gs = android.provider.Settings.Secure.getString(getActivity().getContentResolver(),
                android.provider.Settings.Secure.LOCATION_PROVIDERS_ALLOWED);
        if (gs.indexOf("gps", 0) < 0) {

            //Toast.makeText(getActivity(), "GPS 설정안됨", 1000).show();
            //GPS가 안켜져있으면 켜는 설정으로 이동
            new AlertDialog.Builder(getActivity())
                    .setTitle("GPS 설정")
                    .setMessage("GPS가 꺼져 있습니다. GPS를 켜시겠습니까?")
                    .setPositiveButton("GPS켜기", new DialogInterface.OnClickListener() {

                        @Override
                        public void onClick(DialogInterface dialog, int which) {
                            Intent intent = new Intent(android.provider.Settings.
                                    ACTION_LOCATION_SOURCE_SETTINGS);
                            startActivity(intent);
                        }
                    }).setOnCancelListener(new DialogInterface.OnCancelListener() {

                @Override
                public void onCancel(DialogInterface dialog) {
                    dialog_cancel_bool = true;
                    dialog.cancel();
                }
            }).show();
        } else {
            //Toast.makeText(getActivity(), "GPS 설정됨", Toast.LENGTH_SHORT).show();
        }

//        GooglePlayServicesUtil.isGooglePlayServicesAvailable(getActivity());
//        locationManager = (LocationManager) getActivity().getSystemService(Context.LOCATION_SERVICE);
//        locationManager.requestLocationUpdates(LocationManager.GPS_PROVIDER,1000, 0, this);

        locationManager = (LocationManager) getActivity().getSystemService(Context.LOCATION_SERVICE);
        Criteria criteria = new Criteria();
        provider = locationManager.getBestProvider(criteria, true);

        long minTime = 3000;
        float minDistance = 0;

        locationManager.requestLocationUpdates(
                provider,
                minTime,
                minDistance, this);
        setUpMapIfNeeded();
        if (ActivityCompat.checkSelfPermission(getActivity(), Manifest.permission.ACCESS_FINE_LOCATION) != PackageManager.PERMISSION_GRANTED && ActivityCompat.checkSelfPermission(getActivity(), Manifest.permission.ACCESS_COARSE_LOCATION) != PackageManager.PERMISSION_GRANTED) {
            // TODO: Consider calling
            //    ActivityCompat#requestPermissions
            // here to request the missing permissions, and then overriding
            //   public void onRequestPermissionsResult(int requestCode, String[] permissions,
            //                                          int[] grantResults)
            // to handle the case where the user grants the permission. See the documentation
            // for ActivityCompat#requestPermissions for more details.
            return;
        }
        map.setMyLocationEnabled(true);

    }


    private void setUpMapIfNeeded() {
        if (map == null) {
            map = ((SupportMapFragment) getActivity().getSupportFragmentManager().findFragmentById(R.id.map)).getMap();
            if (map != null) {
                setUpMap();
            }
        }
    }

    private void setUpMap() {
        if (ActivityCompat.checkSelfPermission(getActivity(), Manifest.permission.ACCESS_FINE_LOCATION) != PackageManager.PERMISSION_GRANTED && ActivityCompat.checkSelfPermission(getActivity(), Manifest.permission.ACCESS_COARSE_LOCATION) != PackageManager.PERMISSION_GRANTED) {
            // TODO: Consider calling
            //    ActivityCompat#requestPermissions
            // here to request the missing permissions, and then overriding
            //   public void onRequestPermissionsResult(int requestCode, String[] permissions,
            //                                          int[] grantResults)
            // to handle the case where the user grants the permission. See the documentation
            // for ActivityCompat#requestPermissions for more details.
            return;
        }
        map.setMyLocationEnabled(true);

        map.getMyLocation();


    }


    public void GetCostTime(double startLat, double startLon, double endLat, double endLon) {
        HTTP_parsing_AsyncTask parsing_AsyncTask = new HTTP_parsing_AsyncTask(startLat, startLon, endLat, endLon);
        parsing_AsyncTask.execute(new String[]{"1"});
    }

    public void DrowRoute(double startLat, double startLon, double endLat, double endLon) {
        routeList = new ArrayList<LatLng>();
        Drow_AsyncTask drow_AsyncTask = new Drow_AsyncTask(startLat, startLon, endLat, endLon);
        drow_AsyncTask.execute(new String[]{"1"});
    }


    public class HTTP_parsing_AsyncTask extends AsyncTask<String, Void, Integer> {
        double startLat = 0;
        double startLon = 0;
        double endLat = 0;
        double endLon = 0;
        volatile int val = 0;

        //    public void GetContext(Context context){
//        this.context = context;
//    }
        public HTTP_parsing_AsyncTask(double startLat, double startLon, double endLat, double endLon) {
            this.startLat = startLat;
            this.startLon = startLon;
            this.endLat = endLat;
            this.endLon = endLon;
        }

        @Override
        protected void onPreExecute() {
            super.onPreExecute();
        }

        @Override
        protected Integer doInBackground(String... params) {
            val = 0;
            String url = "";
            String strBuf = "";
//            Log.i("### HTTP_parsing: ", "### " + startLat + "  " + startLon + "  " + endLat + "  " + endLon);


            //다음 좌표로 변환
//            url = "http://apis.daum.net/maps/transcoord?apikey=4ea71af07ab0504cf561d740334d4ce0&x="
//                    + startLon
//                    + "&y="
//                    + startLat
//                    + "&fromCoord=wgs84&toCoord=wcongnamul&output=xml";
//            String strBuf = "";
//            Log.i("### GetCostTime위치: ", "### 들어오기 직전 ");
//            try {
//                strBuf = (Jsoup.connect(url).timeout(20000)
//                        .ignoreContentType(true).execute().body());
//                Log.i("### GetCostTime위치2: ", "### "+strBuf);
//                String[] tmpStrArr = strBuf.split("'");
//                startLat = Double.parseDouble(tmpStrArr[1]);
//                startLon = Double.parseDouble(tmpStrArr[3]);
//                Log.i("### GetCostTime위치: ", "### "+strBuf);
//                Log.i("### GetCostTime위치: ", "### "+tmpStrArr[1]);
//                Log.i("### GetCostTime위치: ", "### "+tmpStrArr[3]);
//
//                url = "http://apis.daum.net/maps/transcoord?apikey=4ea71af07ab0504cf561d740334d4ce0&x="
//                        + endLon
//                        + "&y="
//                        + endLat
//                        + "&fromCoord=wgs84&toCoord=wcongnamul&output=xml";
//                strBuf = (Jsoup.connect(url).timeout(20000)
//                        .ignoreContentType(true).execute().body());
//                Log.i("### GetCostTime위치2: ", "### "+strBuf);
//                String[] tmpStrArr2 = strBuf.split("'");
//                endLat = Double.parseDouble(tmpStrArr2[1]);
//                endLon = Double.parseDouble(tmpStrArr2[3]);
//                Log.i("### GetCostTime위치2: ", "### "+strBuf);
//                Log.i("### GetCostTime위치2: ", "### "+tmpStrArr2[1]);
//                Log.i("### GetCostTime위치2: ", "### "+tmpStrArr2[3]);
//
//            } catch (Throwable t) {
//                Log.i("### GetCostTime안댐2: ", "### "+"안댐");
//            }


            //!@###
            CoordPoint result;
            transform tf = new transform();
            result = tf.trans(Double.toString(startLon), Double.toString(startLat));

            startLat = result.f8x;
            startLon = result.f9y;

            tf = new transform();
            result = tf.trans(Double.toString(endLon), Double.toString(endLat));

            endLat = result.f8x;
            endLon = result.f9y;

//            Log.i("### 변환된 좌표: ", "### " + result.f8x + "  " + result.f9y + "  " + result.f8x + "  " + result.f9y);


//            tf = new transform();
//            result = tf.trans(Double.toString(127),Double.toString(37.5));
//
//            startLat = result.f8x;
//            startLon = result.f9y;
//
//            tf = new transform();
//            result = tf.trans(Double.toString(127.01),Double.toString(37.5));
//
//            endLat = result.f8x;
//            endLon = result.f9y;
//
//            Log.i("### %%%2: ", "### "+startLat+"  "+startLon+"  "+endLat+"  "+endLon);
            // 거리 가져오기
            url = "http://map.daum.net/route/walkset.json?callback=jQuery1810362975598545745_1435566230779&sName=%EA%B2%BD%EB%B6%81+%EA%B5%AC%EB%AF%B8%EC%8B%9C+%EA%B1%B0%EC%9D%98%EB%8F%99+468&sX="
                    + startLat
                    + "&sY="
                    + startLon
                    + "+&eName=%EA%B2%BD%EB%B6%81+%EA%B5%AC%EB%AF%B8%EC%8B%9C+%EA%B1%B0%EC%9D%98%EB%8F%99+468&eX="
                    + endLat + "+&eY=" + endLon + "&ids=%2C";

            try {
                strBuf = (Jsoup.connect(url).timeout(20000)
                        .ignoreContentType(true).execute().body());

                strBuf = strBuf.substring(strBuf.indexOf('(') + 1,
                        strBuf.length() - 1);

                System.out.println(strBuf);
//                Log.i("### GetCostTime위치2: ", "### " + strBuf);

                try {

                    JSONObject Jobject = new JSONObject(strBuf);

                    JSONArray Jarray = new JSONArray(
                            Jobject.getString("directions"));

                    Jobject = Jarray.getJSONObject(0); // ū��켱

                    Jarray = new JSONArray(Jobject.getString("sections"));
                    //Log.i("### 두번째 get time", "### get time: " + Jarray.getString(0));

                    Jobject = Jarray.getJSONObject(0);

//                    Jarray = new JSONArray(Jobject.getString("guideList"));
//                    Log.i("### 두번째 get time", "### get time: " + Jarray.getString(0));

                    val = Jobject.getInt("time");

                } catch (JSONException e) {
                    e.printStackTrace();
                }


            } catch (Exception e) {
                e.printStackTrace();
//                Log.i("### GetCostTime안댐2: ", "### " + "안댐");
            }
            Log.i("### val: ", "### " + val);
            //분
            {
                if (val != 0)
                    val = (val / 240);
                else
                    val = -1;
            }
            return val;
        }

        @Override
        protected void onPostExecute(Integer costTime) {
            super.onPostExecute(costTime);

            if (costTime != (-1)) {

                //map.addPolyline(new PolylineOptions().add(latlng.get(keyName), myLoc).width(5).color(Color.RED));
                text_restTime.setText("약 " + costTime + "분 후 도착.");

                if (costTime < 10 && didNotNoti) { //10분 이내로 남았다. 노티를 날려야 한다. !@#

                    if (!pref.getValue("NOTI", getDate()).equals(getDate())) { //오늘 날짜랑 최근 저장된 날짜랑 같지 않으면
                        //노티 날리기
                        Notification();


                        didNotNoti = false; //노티 날렸으니
                        pref.put("NOTI", getDate());
                    }
                }
            } else {
                text_restTime.setText("1시간 이상 남았습니다.");
            }

        }
    }


    public class Drow_AsyncTask extends AsyncTask<String, Void, Integer> {
        double startLat = 0;
        double startLon = 0;
        double endLat = 0;
        double endLon = 0;
        volatile int val = 0;

        //    public void GetContext(Context context){
//        this.context = context;
//    }
        public Drow_AsyncTask(double startLat, double startLon, double endLat, double endLon) {
            this.startLat = startLat;
            this.startLon = startLon;
            this.endLat = endLat;
            this.endLon = endLon;
        }

        @Override
        protected void onPreExecute() {
            super.onPreExecute();
        }

        @Override
        protected Integer doInBackground(String... params) {
            val = 0;
            String url = "";
            String strBuf = "";
//            Log.i("### Drow_AsyncTask: ", "### " + startLat + "  " + startLon + "  " + endLat + "  " + endLon);

            CoordPoint result;
            transform tf = new transform();
            result = tf.trans(Double.toString(startLon), Double.toString(startLat));

            startLat = result.f8x;
            startLon = result.f9y;

            tf = new transform();
            result = tf.trans(Double.toString(endLon), Double.toString(endLat));

            endLat = result.f8x;
            endLon = result.f9y;

//            Log.i("###Drow_AsyncTask변환된 좌표", "### " + result.f8x + "  " + result.f9y + "  " + result.f8x + "  " + result.f9y);

            // 거리 가져오기
            url = "http://map.daum.net/route/walkset.json?callback=jQuery1810362975598545745_1435566230779&sName=%EA%B2%BD%EB%B6%81+%EA%B5%AC%EB%AF%B8%EC%8B%9C+%EA%B1%B0%EC%9D%98%EB%8F%99+468&sX="
                    + startLat
                    + "&sY="
                    + startLon
                    + "+&eName=%EA%B2%BD%EB%B6%81+%EA%B5%AC%EB%AF%B8%EC%8B%9C+%EA%B1%B0%EC%9D%98%EB%8F%99+468&eX="
                    + endLat + "+&eY=" + endLon + "&ids=%2C";

            try {
                strBuf = (Jsoup.connect(url).timeout(20000)
                        .ignoreContentType(true).execute().body());

                strBuf = strBuf.substring(strBuf.indexOf('(') + 1,
                        strBuf.length() - 1);

                System.out.println(strBuf);
//                Log.i("### GetCostTime위치2: ", "### " + strBuf);

                try {

                    JSONObject Jobject = new JSONObject(strBuf);

                    JSONArray Jarray = new JSONArray(
                            Jobject.getString("directions"));

                    Jobject = Jarray.getJSONObject(0);

                    Jarray = new JSONArray(Jobject.getString("sections"));

                    Jobject = Jarray.getJSONObject(0);

                    Jarray = new JSONArray(Jobject.getString("guideList"));

                    val = Jobject.getInt("time");

                    String tmpguideMent;
                    double tmpx;
                    double tmpy;

                    for (int i = 0; i < Jarray.length(); i++) {
                        Jobject = Jarray.getJSONObject(i);

                        tmpx = Double.parseDouble(Jobject.getString("x"));
                        tmpy = Double.parseDouble(Jobject.getString("y"));
//                        Log.i("### 변환 전 경로:","# "+tmpx+"   "+tmpy);


//                        tf = new transform();
//                        result = tf.transBack(Double.toString(tmpy), Double.toString(tmpx));
//
//                        tmpy = result.f8x;
//                        tmpx = result.f9y;
//                        Log.i("### 변환 반대 경로:","# "+tmpx+"   "+tmpy);


                        tf = new transform();
                        result = tf.transBack(Double.toString(tmpx), Double.toString(tmpy));

                        tmpy = result.f8x;
                        tmpx = result.f9y;
//                        Log.i("### 변환 경로:","# "+tmpx+"   "+tmpy);

                        routeList.add(new LatLng(tmpx, tmpy));
                    }


                } catch (JSONException e) {
                    e.printStackTrace();
                }


            } catch (Exception e) {
                e.printStackTrace();
//                Log.i("### GetCostTime안댐2: ", "### " + "안댐");
            }
//            Log.i("### val: ", "### " + val);
            //분
            {
                if (val != 0)
                    val = (val / 240);
                else
                    val = -1;
            }
            return val;
        }

        @Override
        protected void onPostExecute(Integer costTime) {
            super.onPostExecute(costTime);

            if (costTime != (-1)) {

                text_restTime.setText("약 " + costTime + "분 후 도착.");
                isDoneSaveRoute = true;


            } else {
                text_restTime.setText("1시간 이상 남았습니다.");
            }

        }
    }
}
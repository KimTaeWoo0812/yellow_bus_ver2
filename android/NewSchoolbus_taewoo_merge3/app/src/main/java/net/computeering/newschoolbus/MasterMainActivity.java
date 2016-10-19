package net.computeering.newschoolbus;

import android.app.AlertDialog;
import android.content.ComponentName;
import android.content.DialogInterface;
import android.content.Intent;
import android.os.Bundle;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
import android.support.design.widget.TabLayout;
import android.support.v4.app.Fragment;
import android.support.v4.app.FragmentManager;
import android.support.v4.app.FragmentPagerAdapter;
import android.support.v4.view.ViewPager;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.view.ViewGroup;
import android.webkit.WebView;
import android.widget.TextView;
import android.widget.Toast;

import net.computeering.newschoolbus.Attend_log_Package.CaldroidSampleFragment;
import net.computeering.newschoolbus.DataPackage.SchoolData;
import net.computeering.newschoolbus.DataPackage.UserData;
import net.computeering.newschoolbus.LoginPackage.BackPressCloseHandler;
import net.computeering.newschoolbus.LoginPackage.LoginActivity;
import net.computeering.newschoolbus.RealLogPackage.Reallog_CalendarViewFragment;
import net.computeering.newschoolbus.SchoolManagePackage.ChooseCar_Activity;
import net.computeering.newschoolbus.Xepushapp.Xepushapp_MainActivity;

import net.computeering.newschoolbus.MapFragmentPackage.MapFragment;

public class MasterMainActivity extends AppCompatActivity {
    ComponentName beaconServiceVar;
    CustomPreferences MasterMainActivity_pref;
//    private BackPressCloseHandler backPressCloseHandler;
    /**
     * The {@link android.support.v4.view.PagerAdapter} that will provide
     * fragments for each of the sections. We use a
     * {@link FragmentPagerAdapter} derivative, which will keep every
     * loaded fragment in memory. If this becomes too memory intensive, it
     * may be best to switch to a
     * {@link android.support.v4.app.FragmentStatePagerAdapter}.
     */
    private SectionsPagerAdapter mSectionsPagerAdapter;
    /**
     * The {@link ViewPager} that will host the section contents.
     */
    private ViewPager mViewPager;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_master_main);

//        backPressCloseHandler = new BackPressCloseHandler(this);
        MasterMainActivity_pref = new CustomPreferences(this);
        /**
         * 이하 onCreate항목은 기본값을 최대한 유지합니다.
         */
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);
        // Create the adapter that will return a fragment for each of the three
        // primary sections of the activity.
        mSectionsPagerAdapter = new SectionsPagerAdapter(getSupportFragmentManager());

        // Set up the ViewPager with the sections adapter.
        mViewPager = (ViewPager) findViewById(R.id.container);
        mViewPager.setAdapter(mSectionsPagerAdapter);

        TabLayout tabLayout = (TabLayout) findViewById(R.id.tabs);
        tabLayout.setupWithViewPager(mViewPager);
    }

    @Override
    public void onBackPressed() {
        // TODO Auto-generated method stub
        Dialog_ForBackPressed();
//        backPressCloseHandler.onBackPressed();
        //moveTaskToBack(true);
    }
    public void Dialog_ForBackPressed(){
        AlertDialog.Builder alt_bld = new AlertDialog.Builder(this);
        alt_bld.setMessage("앱을 종료하시겠습니까?").setCancelable(
                false).setPositiveButton("취소",
                new DialogInterface.OnClickListener() {
                    public void onClick(DialogInterface dialog, int id) {
                        dialog.cancel();
                    }
                }).setNegativeButton("종료",
                new DialogInterface.OnClickListener() {
                    public void onClick(DialogInterface dialog, int id) {
                        finish();
                        android.os.Process.killProcess(android.os.Process.myPid());
                        dialog.cancel();
                    }
                });
        AlertDialog alert = alt_bld.create();
        // Title for AlertDialog
        alert.setTitle("앱 종료");
        // Icon for AlertDialog
        alert.setIcon(R.drawable.logo);
        alert.show();
    }
    @Override
    protected void onResume() {
        super.onResume();
    }

    @Override
    protected void onDestroy() {
        super.onDestroy();

        if (beaconServiceVar == null) {
            return;
        }
        Intent i = new Intent();
        i.setComponent(beaconServiceVar);
        if (stopService(i)) {
            Log.e("MMA_Seongho", "Service Stopped!!");
            Toast.makeText(getApplicationContext(), "비콘 감지 서비스 종료됨", Toast.LENGTH_SHORT);
        } else {
            Log.e("MMA_Seongho", "Service ALREADY Stopped!!");
            Toast.makeText(getApplicationContext(), "비콘 감지 서비스 이미 종료됨", Toast.LENGTH_SHORT);
        }


    }

//    @Override
//    protected void onPause(){
//        for (int i = 0; i < SchoolData.carList.size(); i++) {
//            UDP_SC.SendMsg("STOP" + UDP_SC._del + SchoolData.carList.get(i)+ UDP_SC._del +"메인페이지");
//            Log.e("Map:  ", SchoolData.carList.get(i));
//            Log.e("Map: -> ", UDP_SC._del);
//            try {
//                Thread.sleep(10);
//            } catch (InterruptedException e) {
//                e.printStackTrace();
//            }
//        }
//        super.onPause();
//
//    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
//        Log.i("###role",""+SchoolData.role);
            if(SchoolData.role.equals("1")) //학부모
            getMenuInflater().inflate(R.menu.menu_master_main_for_student, menu);
        else
            getMenuInflater().inflate(R.menu.menu_master_main_for_manager, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();

        //noinspection SimplifiableIfStatement
        if (id == R.id.action_driveing_car) { //여기 role로 나누면 댐
            Intent goAdminIntent = new Intent(MasterMainActivity.this, ChooseCar_Activity.class);
            startActivity(goAdminIntent);
            return true;
        }

        if (id == R.id.action_logout_in_mastermainactivity) {
            MasterMainActivity_pref = new CustomPreferences(this);
            Dialog_ForLogout();
            return true;
        }

        return super.onOptionsItemSelected(item);
    }

    public void Dialog_ForLogout(){
        AlertDialog.Builder alt_bld = new AlertDialog.Builder(this);
        alt_bld.setMessage("로그아웃 하시겠습니까?").setCancelable(
                false).setPositiveButton("취소",
                new DialogInterface.OnClickListener() {
                    public void onClick(DialogInterface dialog, int id) {
                        dialog.cancel();
                    }
                }).setNegativeButton("로그아웃",
                new DialogInterface.OnClickListener() {
                    public void onClick(DialogInterface dialog, int id) {
                        MasterMainActivity_pref.put(CustomPreferences.AUTOLOGIN_prevalue, "FALSE");
                        MasterMainActivity_pref.put(CustomPreferences.AMIFIRST_prefvalue, "FALSE");
                        Intent gobackLoginActivityIntent = new Intent(MasterMainActivity.this, LoginActivity.class);
                        startActivity(gobackLoginActivityIntent);
                        finish();
                        dialog.cancel();
                    }
                });
        AlertDialog alert = alt_bld.create();
        // Title for AlertDialog
        alert.setTitle("로그아웃");
        // Icon for AlertDialog
        alert.setIcon(R.drawable.logo);
        alert.show();
    }

    /**
     * A placeholder fragment containing a simple view.
     */
    public static class PlaceholderFragment extends Fragment {
        /**
         * The fragment argument representing the section number for this
         * fragment.
         */
        private static final String ARG_SECTION_NUMBER = "section_number";

        @Override
        public View onCreateView(LayoutInflater inflater, ViewGroup container,
                                 Bundle savedInstanceState) {
            View rootView = inflater.inflate(R.layout.fragment_master_main, container, false);
//            TextView textView = (TextView) rootView.findViewById(R.id.section_label);
//            textView.setText(getString(R.string.section_format, getArguments().getInt(ARG_SECTION_NUMBER)));


            return rootView;
        }
    }

    /**
     * A simple fragment that displays a TextView.
     */


//    public class SetList extends AsyncTask<String, Void, String> {
//        String msg = "";
//
//        @Override
//        protected void onPreExecute() {
//            super.onPreExecute();
//        }
//
//        @Override
//        protected String doInBackground(String... params) {
//            TCP_Socket.socket = TCP_Socket.shared();
//            String type = params[0];
//            if (type.compareTo("1") == 0) {
//
//                msg = "S_INFO" + TCP_SC._del + SchoolData.schoolName + TCP_SC._del;
//                TCP_Socket.socket.SendMsg(msg);
//
//                msg = TCP_Socket.socket.GetMsg();
//                if (msg.equals("100"))
//                    return "100";
//                Log.e("Main_test:  ", msg);
//                String msgs[] = msg.split(TCP_SC._del);
//
//                SchoolData.schoolName = msgs[1];
//                String temp[] = msgs[2].split("!");
//                SchoolData.lat = temp[0];
//                SchoolData.lon = temp[1];
//            }
//
//            //비콘
////            msg = "S_BEACON" + TCP_SC._del + SchoolData.schoolName + TCP_SC._del;
////
////            TCP_Socket.socket.SendMsg(msg);
////
////            for (; ; ) {
////                msg = TCP_Socket.socket.GetMsg();
////                if (msg.equals("100"))
////                    return "100";
////
////                Log.e("Main_test:  ", msg + "  ");
////                boolean out = false;
////                String MSGS[] = msg.split(TCP_SC._endDel);
////                for (int i = 0; i < MSGS.length; i++) {
////                    String msgs[] = MSGS[i].split(TCP_SC._del);
////                    if (i == 0) {
////                        //비콘 받기
////                        if (!msgs[1].equals("0"))
////                            SchoolData.beaconList.add(msgs[1] + TCP_SC._del + msgs[2]);
////                        else {
////                            out = true;
////                        }
////                    } else {
////                        if (!msgs[0].equals("0"))
////                            SchoolData.beaconList.add(msgs[0] + TCP_SC._del + msgs[1]);
////                        else {
////                            out = true;
////                        }
////                    }
////
////                }
////                if (out)
////                    break;
////            }
//
//            ServerCheck.hideLoading();
//
//            return "1";
//        }
//
//        @Override
//        protected void onPostExecute(String result) {
//            super.onPostExecute(result);
//
//            TCP_Socket.socket.CloseSocket();
//
//            if (result.compareTo("1") == 0) {
//                //학원 정보 화면에 출력
//
//
//            }
//            if (result.compareTo("100") == 0) {
//                Toast.makeText(MasterMainActivity.this, "연결이 불안정 합니다. 다시 시도해주세요!",
//                        Toast.LENGTH_SHORT).show();
//                finish();
//            }
//        }
//    }

    /**
     * A {@link FragmentPagerAdapter} that returns a fragment corresponding to
     * one of the sections/tabs/pages.
     */
    public class SectionsPagerAdapter extends FragmentPagerAdapter {

        public SectionsPagerAdapter(FragmentManager fm) {
            super(fm);
        }

        @Override
        public Fragment getItem(int position) {
            // getItem is called to instantiate the fragment for the given page.
            // Return a PlaceholderFragment (defined as a static inner class below).
            switch (position) {
                case 0:
                    return new Xepushapp_MainActivity();
                case 1:
                    return new MapFragment();
                case 2:
                    return new CaldroidSampleFragment();
                default:
                    return new CaldroidSampleFragment();
            }
        }

        @Override
        public int getCount() {
            // Show 3 total pages.
            return 3;
        }

        @Override
        public CharSequence getPageTitle(int position) {
            switch (position) {
                case 0:
                    return "학 원   홈";
                case 1:
                    return "차 량   위 치";
                case 2:
                    return "활 동   로 그";
            }
            return null;
        }
    }

}

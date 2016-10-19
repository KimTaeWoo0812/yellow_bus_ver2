package net.computeering.newschoolbus.SchoolManagePackage;

import android.content.Context;
import android.content.Intent;
import android.graphics.Color;
import android.os.AsyncTask;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.ListView;
import android.widget.TextView;
import android.widget.Toast;

import net.computeering.newschoolbus.DataPackage.SchoolData;
import net.computeering.newschoolbus.R;
import net.computeering.newschoolbus.TCP.ServerCheck;
import net.computeering.newschoolbus.TCP.TCP_SC;
import net.computeering.newschoolbus.TCP.TCP_Socket;

import java.util.ArrayList;

public class ChooseCar_Activity extends AppCompatActivity {
    Context mContext = this;
    ListView listView;
    LinearLayout layout;
    String temp_carName = "";
    private boolean waitForCarlist = true;
    private boolean checkForDoneMsg = false;
    public ArrayList<String> carCheck;
    ImageView btn_drive_car;
    private int pos = -1;
    boolean isFirstCheck = true;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_choose_car_);

        btn_drive_car = (ImageView)findViewById(R.id.btn_drive_car);
        carCheck = new ArrayList<String>();

        (new SetList()).execute(new String[]{"3"});
        ServerCheck.showLoading(ChooseCar_Activity.this);

        for(;waitForCarlist;)
            ;

        listView = (ListView) findViewById(R.id.listView);
        layout = (LinearLayout) this.findViewById(R.id.mainLayout);


        ListAdapter adapter = new ListAdapter(mContext, 0,SchoolData.carList);
        listView.setAdapter(adapter);
        listView.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> parent, View view,
                                    int position, long id) {
                if (carCheck.get(position).equals("0")) { //주행 중인 차가 아니라면
//                    view.setBackgroundColor(Color.GREEN);
                    isFirstCheck = false;
                    pos= position;
                } else {
                    pos=-1;
                    Toast.makeText(ChooseCar_Activity.this, "이미 운행중인 차량입니다.",
                            Toast.LENGTH_SHORT).show();
                }
            }
        });

        btn_drive_car.setOnClickListener(new View.OnClickListener() {//!!!
            public void onClick(View v) {
                if(pos!=-1) {
                    checkForDoneMsg = true;
                    //운행 시작 알림
                    temp_carName = SchoolData.carList.get(pos);
                    (new SetList()).execute(new String[]{"1"});
                    ServerCheck.showLoading(ChooseCar_Activity.this);

                    Intent intent1 = new Intent(ChooseCar_Activity.this, Map_Running_car_Activity.class);
                    intent1.putExtra("carName", SchoolData.carList.get(pos));
                    startActivity(intent1);
                }
                else if(isFirstCheck){
                    Toast.makeText(ChooseCar_Activity.this, "차량을 선택해주세요!",
                            Toast.LENGTH_SHORT).show();
                }
                else{
                    Toast.makeText(ChooseCar_Activity.this, "이미 운행중인 차량입니다.",
                            Toast.LENGTH_SHORT).show();
                }
            }
        });
    }
    @Override
    protected void onResume() {
        super.onResume();
        if(checkForDoneMsg) {
            (new SetList()).execute(new String[]{"2"});
            checkForDoneMsg = false;
        }

    }


    private class ListAdapter extends ArrayAdapter<String> {

        public ListAdapter(Context context, int resource,
                           ArrayList<String> noticeData) {
            super(context, resource, noticeData);
        }

        @Override
        public View getView(int position, View convertView, ViewGroup parent) {

            LayoutInflater inflater = (LayoutInflater) mContext.getSystemService(LAYOUT_INFLATER_SERVICE);
            View rowView = inflater.inflate(R.layout.activity_choose_car_adapter,
                    null, true);

            TextView carName = (TextView) rowView.findViewById(R.id.carName);
            carName.setText(SchoolData.carList.get(position));

            return rowView;
            // return super.getView(position, convertView, parent);
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
            TCP_Socket.socket = TCP_Socket.shared();
            String type = params[0];
            if (type.compareTo("1") == 0) {

                msg = "S_CAR_START" + TCP_SC._del + SchoolData.schoolName + TCP_SC._del + temp_carName + TCP_SC._del;
                TCP_Socket.socket.SendMsg(msg);

                msg = TCP_Socket.socket.GetMsg();
                if (msg.equals("100"))
                    return "100";

                ServerCheck.hideLoading();
                return "1";
            }

            else if (type.compareTo("2") == 0) {

                msg = "S_CAR_DONE" + TCP_SC._del + SchoolData.schoolName + TCP_SC._del + temp_carName + TCP_SC._del;
                TCP_Socket.socket.SendMsg(msg);

                msg = TCP_Socket.socket.GetMsg();
                if (msg.equals("100"))
                    return "100";

                ServerCheck.hideLoading();
                return "2";
            }
            else if (type.compareTo("3") == 0) {
                SchoolData.carList.clear();

                msg = "S_CAR_FOR_DRIVER" + TCP_SC._del + SchoolData.schoolName + TCP_SC._del;
                TCP_Socket.socket.SendMsg(msg);

                for (; ; ) {
                    msg = TCP_Socket.socket.GetMsg();
                    if (msg.equals("100"))
                        return "100";
                    boolean out = false;
                    Log.e("Main_test:  ", msg + "  ");

//                for(int j=0;j<= TCP_Que.top;j++){
//                    Log.e("Main_test for ", TCP_Que.Queue[j]);
//                }
                    String MSGS[] = msg.split(TCP_SC._endDel);

                    for (int i = 0; i < MSGS.length; i++) {

                        String msgs[] = MSGS[i].split(TCP_SC._del);
                        //Log.e("Main_test", msgs[1] + "  " + msgs[2]);
                        if (i == 0) {
                            //차 받기
                            if (!msgs[1].equals("0")) {
                                SchoolData.carList.add(SchoolData.schoolName + "!" + msgs[1]);
                                carCheck.add(msgs[2]);
                            }
                            else {
                                out = true;
                            }
                        } else {
                            if (!msgs[0].equals("0")) {
                                SchoolData.carList.add(SchoolData.schoolName + "!" + msgs[0]);
                                carCheck.add(msgs[1]);
                            }
                            else {
                                out = true;
                            }
                        }

                    }
                    if (out)
                        break;
                }

                ServerCheck.hideLoading();
                waitForCarlist = false;

                return "2";
            }

            return "0";
        }

        @Override
        protected void onPostExecute(String result) {
            super.onPostExecute(result);

            TCP_Socket.socket.CloseSocket();
            if (result.compareTo("1") == 0) {

            }
            else if (result.compareTo("2") == 0) {

            }
            else if (result.compareTo("100") == 0) {
                Toast.makeText(ChooseCar_Activity.this, "연결이 불안정 합니다. 다시 시도해주세요!",
                        Toast.LENGTH_SHORT).show();
                finish();
            }

        }
    }
}

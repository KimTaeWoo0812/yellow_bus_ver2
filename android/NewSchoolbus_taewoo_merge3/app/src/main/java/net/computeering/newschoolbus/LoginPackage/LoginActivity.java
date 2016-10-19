package net.computeering.newschoolbus.LoginPackage;

import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.CheckBox;
import android.widget.EditText;
import android.widget.Toast;

import net.computeering.newschoolbus.CustomPreferences;
import net.computeering.newschoolbus.DataPackage.SchoolData;
import net.computeering.newschoolbus.DataPackage.UserData;
import net.computeering.newschoolbus.MasterMainActivity;
import net.computeering.newschoolbus.NewSchoolListPackage.NewSchoolListMainActivity;
import net.computeering.newschoolbus.R;
import net.computeering.newschoolbus.TCP.ServerCheck;
import net.computeering.newschoolbus.TCP.TCP_SC;
import net.computeering.newschoolbus.TCP.TCP_Socket;

//MD5 로그인 암호화 처리 import
import java.math.BigInteger;
import java.security.MessageDigest;
import java.security.NoSuchAlgorithmException;

public class LoginActivity extends AppCompatActivity {
    private static final String TAG = "LoginActivity";
    private static final int REQUEST_SIGNUP = 0;
    private BackPressCloseHandler backPressCloseHandler;

    CustomPreferences LoginActivity_pref = new CustomPreferences(this);
    EditText _emailText;
    EditText _passwordText;
    Button _loginButton;
    String ID = "";
    String PW = "";
    String brforePW = "";
    String beforeEncode_PW_forSaveing = "";
    CheckBox _autologinCheckbox;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        backPressCloseHandler = new BackPressCloseHandler(this);
        _loginButton = (Button) findViewById(R.id.btn_login);
        _emailText = (EditText) findViewById(R.id.input_email);
        _passwordText = (EditText) findViewById(R.id.input_password);
        _autologinCheckbox = (CheckBox) findViewById(R.id.autoLogin_chkbox);


        if(LoginActivity_pref.getValue(CustomPreferences.AUTOLOGIN_prevalue, "").equals("TRUE")) {
            _emailText.setText(LoginActivity_pref.getValue(ID, ""));
            _passwordText.setText(LoginActivity_pref.getValue(PW, ""));

            ID = LoginActivity_pref.getValue(CustomPreferences.EMAIL_prefvalue, "");
            PW = LoginActivity_pref.getValue(CustomPreferences.PASSWORD_prefvalue, "");
            _emailText.setText(ID);
            _passwordText.setText(PW);
            login();
        }else {
           _emailText.setText(LoginActivity_pref.getValue(CustomPreferences.EMAIL_prefvalue, ""));
            _passwordText.setText(LoginActivity_pref.getValue(CustomPreferences.PASSWORD_prefvalue, ""));
        }


        _loginButton.setOnClickListener(new View.OnClickListener() {
            public void onClick(View v) {
                ID = _emailText.getText().toString();
                beforeEncode_PW_forSaveing = PW = _passwordText.getText().toString();

                login();
                //login();
            }
        });

    }

    @Override
    public void onBackPressed() {
        // TODO Auto-generated method stub
        backPressCloseHandler.onBackPressed();
        //moveTaskToBack(true);
    }

    public void login() {
        // TODO: Implement your own authentication logic here.

        //서버에게 LA에 있는 아이디,비밀번호를 전송합니다.
        brforePW = PW;
        PW = getMD5Hash(_passwordText.getText().toString());
        (new SetList()).execute(new String[]{"1"});
        ServerCheck.showLoading(this);

        // TODO: End of your own authentication logic here.

    }

    @Override
    protected void onActivityResult(int requestCode, int resultCode, Intent data) {
        if (requestCode == REQUEST_SIGNUP) {
            if (resultCode == RESULT_OK) {

                // TODO: Implement successful signup logic here
                // By default we just finish the Activity and log them in automatically
                this.finish();
            }
        }
    }
    public boolean validate() {
        boolean valid = true;

        _emailText = (EditText) findViewById(R.id.input_email);
        _passwordText = (EditText) findViewById(R.id.input_password);

        String email = _emailText.getText().toString();
        String password = _passwordText.getText().toString();

        if (email.isEmpty() || !android.util.Patterns.EMAIL_ADDRESS.matcher(email).matches()) {
            _emailText.setError("enter a valid email address");
            valid = false;
        } else {
            _emailText.setError(null);
        }

        if (password.isEmpty() || password.length() < 4 || password.length() > 10) {
            _passwordText.setError("between 4 and 10 alphanumeric characters");
            valid = false;
        } else {
            _passwordText.setError(null);
        }

        return valid;
    }

    //    TCP소켓 송수신부
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
            if (type.equals("1")) {
                msg = "LOGIN" + TCP_SC._del + ID + TCP_SC._del + PW;

                TCP_Socket.socket.SendMsg(msg);

                msg = TCP_Socket.socket.GetMsg();
                if (msg.equals("100"))
                    return "100";

                String msgs2[] = msg.split(TCP_SC._del);

                if (msgs2[1].equals("0")) {
                    return "0";
                }


//                UserData.name = msgs2[1];
                UserData.id = ID;
                UserData.pw = PW;

                SchoolData.role = msgs2[1];
                SchoolData.schoolName = msgs2[2];
                String temp[] = msgs2[3].split("!");

                Log.i("###!",""+ msgs2[3]);
                Log.i("###!",""+ temp[0]);
                Log.i("###!",""+ temp[1]);

                SchoolData.lat = temp[0];
                SchoolData.lon = temp[1];


//                TCP_Socket.socket = TCP_Socket.shared();
                SchoolData.carList.clear();

                msg = "S_CAR" + TCP_SC._del + SchoolData.schoolName + TCP_SC._del;
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
                return "1";
            }
            return "0";
        }

        @Override
        protected void onPostExecute(String result) {
            super.onPostExecute(result);

            ServerCheck.hideLoading();
            TCP_Socket.socket.CloseSocket();

            if (result.equals("1")) {
//                Log.i("###로그인",""+_autologinCheckbox.isChecked());
//                Log.i("###로그인",""+ID);
//                Log.i("###로그인",""+brforePW);
                if (_autologinCheckbox.isChecked()) {
                    LoginActivity_pref.put(CustomPreferences.AUTOLOGIN_prevalue, "TRUE");
                    LoginActivity_pref.put(CustomPreferences.EMAIL_prefvalue, ID);
                    LoginActivity_pref.put(CustomPreferences.PASSWORD_prefvalue, brforePW);
                    //LoginActivity_pref.getValue("PW","");
                }
//                LoginActivity_pref.put(CustomPreferences.EMAIL_prefvalue, ID);
//                LoginActivity_pref.put(CustomPreferences.PASSWORD_prefvalue, beforeEncode_PW_forSaveing);
                if (SchoolData.carList.size() == 0) {
                    //text_restTime.setText("운행중인 차량이 없습니다.");
                    SchoolData.boolHasCar = false;
                }
                Intent intent_MasterMainActivity = new Intent(LoginActivity.this, MasterMainActivity.class);
                startActivity(intent_MasterMainActivity);
                finish();
            }
            else if(result.equals("0")){
                Toast.makeText(LoginActivity.this, "아이디 또는 비밀번호가 틀렸습니다!",
                        Toast.LENGTH_SHORT).show();
            }
            else {
                Toast.makeText(LoginActivity.this, "연결이 불안정 합니다. 잠시 후 다시 시도해주세요!",
                        Toast.LENGTH_SHORT).show();
            }
        }
    }

    public static String getMD5Hash(String s) {
        MessageDigest m = null;
        String hash = null;

        try {
            m = MessageDigest.getInstance("MD5");
            m.update(s.getBytes(),0,s.length());
            hash = new BigInteger(1, m.digest()).toString(16);
        } catch (NoSuchAlgorithmException e) {
            e.printStackTrace();
        }

        return hash;
    }
}

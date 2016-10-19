package net.computeering.newschoolbus.SplashPackage;

/**
 * Created by Karthik's on 27-02-2016.
 */

import android.animation.AnimatorSet;
import android.animation.ObjectAnimator;
import android.app.Activity;
import android.app.AlertDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.os.Handler;
import android.util.Log;
import android.view.View;
import android.view.animation.AccelerateDecelerateInterpolator;
import android.view.animation.Animation;
import android.view.animation.AnimationUtils;

import net.computeering.newschoolbus.Attend_log_Package.CaldroidSampleFragment;
import net.computeering.newschoolbus.CustomPreferences;
import net.computeering.newschoolbus.DataPackage.SchoolData;
import net.computeering.newschoolbus.DataPackage.UserData;
import net.computeering.newschoolbus.LoginPackage.LoginActivity;
import net.computeering.newschoolbus.MasterMainActivity;
import net.computeering.newschoolbus.R;
import net.computeering.newschoolbus.TCP.TCP_Socket;
import net.computeering.newschoolbus.TCP.ServerCheck;
import net.computeering.newschoolbus.TCP.TCP_SC;
import net.computeering.newschoolbus.UDP.UDP_SC;

public class SplashActivity extends Activity {
    CustomPreferences SplashActivity_pref = new CustomPreferences(this);
    String ID = "";
    String PW = "";

    // Splash screen timer
    private static int SPLASH_TIME_OUT = 3500;
    private KenBurnsView mKenBurns;

    @Override
    protected void onPause() {
        super.onPause();

        this.finish();
    }

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_splash);




        Intent intent = new Intent(SplashActivity.this, temp.class);
        startActivity(intent);
        finish();




//        setAnimation();
//
//        getWindow().getDecorView().setSystemUiVisibility(View.SYSTEM_UI_FLAG_HIDE_NAVIGATION);
//
//        mKenBurns = (KenBurnsView) findViewById(R.id.ken_burns_images);
//        mKenBurns.setImageResource(R.drawable.splash_background);
//
//        /**
//         * TODO :TCP_main() 소켓 열기
//         **/
//
//
//        TCP_SC.SetData();
//        UDP_SC.SetData();
//        SchoolData.SetArrayList();
//
//
//
//
//        new Handler().postDelayed(new Runnable() {
//
//            @Override
//            public void run() {
//
//                if (SplashActivity_pref.getValue(CustomPreferences.AUTOLOGIN_prevalue, "").equals("TRUE")) { //자동 로그인
//                    ServerCheck.showLoading(SplashActivity.this);
//                    (new SetList()).execute(new String[]{"1"});
//                } else {
//                    Intent intent = new Intent(SplashActivity.this, LoginActivity.class);
//                    startActivity(intent);
//                    finish();
//                }
//            }
//        }, SPLASH_TIME_OUT);

    }

    private void setAnimation() {
        ObjectAnimator scaleXAnimation = ObjectAnimator.ofFloat(findViewById(R.id.welcome_text), "scaleX", 5.0F, 1.0F);
        scaleXAnimation.setInterpolator(new AccelerateDecelerateInterpolator());
        scaleXAnimation.setDuration(2000);
        ObjectAnimator scaleYAnimation = ObjectAnimator.ofFloat(findViewById(R.id.welcome_text), "scaleY", 5.0F, 1.0F);
        scaleYAnimation.setInterpolator(new AccelerateDecelerateInterpolator());
        scaleYAnimation.setDuration(2000);
        ObjectAnimator alphaAnimation = ObjectAnimator.ofFloat(findViewById(R.id.welcome_text), "alpha", 0.0F, 1.0F);
        alphaAnimation.setInterpolator(new AccelerateDecelerateInterpolator());
        alphaAnimation.setDuration(2000);
        AnimatorSet animatorSet = new AnimatorSet();
        animatorSet.play(scaleXAnimation).with(scaleYAnimation).with(alphaAnimation);
        animatorSet.setStartDelay(100);
        animatorSet.start();

        findViewById(R.id.imagelogo).setAlpha(1.0F);
        Animation anim = AnimationUtils.loadAnimation(this, R.anim.translate_top_to_center);
        findViewById(R.id.imagelogo).startAnimation(anim);
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
            if (type.equals("1")) {
                ID = SplashActivity_pref.getValue(CustomPreferences.EMAIL_prefvalue, "");
                PW = SplashActivity_pref.getValue(CustomPreferences.PASSWORD_prefvalue, "");
                PW = LoginActivity.getMD5Hash(PW);
                msg = "LOGIN" + TCP_SC._del + ID + TCP_SC._del + PW;

                TCP_Socket.socket.SendMsg(msg);

                msg = TCP_Socket.socket.GetMsg();
                if (msg.equals("100"))
                    return "100";

                String msgs2[] = msg.split(TCP_SC._del);

                if (msgs2[1].equals("0"))
                    return "0";

//                UserData.name = msgs2[1];
                UserData.id = ID;
                UserData.pw = PW;

                SchoolData.role = msgs2[1];
                SchoolData.schoolName = msgs2[2];
//                String temp[] = msgs2[3].split("!");
//                SchoolData.lat = temp[0];
//                SchoolData.lon = temp[1];
                SchoolData.lat = "33";
                SchoolData.lon = "128";



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

                        Log.e("Main_test", MSGS[i]);
                        if (i == 0) {
                            //차 받기
                            if (!msgs[1].equals("0")) {
                                Log.e("Main_test2", SchoolData.schoolName + "!" + msgs[1]);
                                SchoolData.carList.add(SchoolData.schoolName + "!" + msgs[1]);
                            }
                            else {
                                out = true;
                            }
                        } else {
                            if (!msgs[0].equals("0")) {
                                Log.e("Main_test3", SchoolData.schoolName + "!" + msgs[0]);
                                SchoolData.carList.add(SchoolData.schoolName + "!" + msgs[0]);
                            }
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
            return "3";

        }

        @Override
        protected void onPostExecute(String result) {
            super.onPostExecute(result);

            ServerCheck.hideLoading();

            TCP_Socket.socket.CloseSocket();
            if (result.equals("1")) {
                if (SchoolData.carList.size() == 0) {
                    SchoolData.boolHasCar = false;
                }
                Intent intent_MasterMainActivity = new Intent(SplashActivity.this, MasterMainActivity.class);
                startActivity(intent_MasterMainActivity);
                finish();
            } else if (result.equals("0")) {
                SplashActivity_pref.put(CustomPreferences.AUTOLOGIN_prevalue, "FALSE");

                Intent intent_MasterMainActivity = new Intent(SplashActivity.this, LoginActivity.class);
                startActivity(intent_MasterMainActivity);
                finish();
            } else {
                DialogSimple();
            }
        }
    }


    public void DialogSimple() {
        AlertDialog.Builder alt_bld = new AlertDialog.Builder(this);
        alt_bld.setMessage("다시 시도하시겠습니까?").setCancelable(
                false).setPositiveButton("취소",
                new DialogInterface.OnClickListener() {
                    public void onClick(DialogInterface dialog, int id) {
                        // do something
                        android.os.Process.killProcess(android.os.Process.myPid());// 완전종료
                        dialog.cancel();
                    }
                }).setNegativeButton("다시 시도",
                new DialogInterface.OnClickListener() {
                    public void onClick(DialogInterface dialog, int id) {

                        Intent intent5 = new Intent(SplashActivity.this,
                                SplashActivity.class);
                        startActivity(intent5);
                        finish();// 이 화면 종료

                        dialog.cancel();
                    }
                });
        AlertDialog alert = alt_bld.create();
        // Title for AlertDialog
        alert.setTitle("서버와 연결 실패");
        // Icon for AlertDialog
        alert.setIcon(R.drawable.logo);
        alert.show();
    }
}
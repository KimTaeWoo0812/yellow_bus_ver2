package net.computeering.newschoolbus.SplashPackage;

import android.app.Activity;
import android.app.AlertDialog;
import android.content.DialogInterface;
import android.os.Bundle;

import net.computeering.newschoolbus.R;

/**
 * Created by kimtaewoo on 2016-07-28.
 */
public class temp  extends Activity {
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.temp);

//        DialogSimple2();


    }
    public void DialogSimple2() {
        AlertDialog.Builder alt_bld = new AlertDialog.Builder(temp.this);
        alt_bld.setMessage("포토존에 왔습니다.\n 사진을 찍으시겠습니까?").setCancelable(
                false).setPositiveButton("No",
                new DialogInterface.OnClickListener() {
                    public void onClick(DialogInterface dialog, int id) {
                        dialog.cancel();
                    }
                }).setNegativeButton("Yes",
                new DialogInterface.OnClickListener() {
                    public void onClick(DialogInterface dialog, int id) {

                        dialog.cancel();

                    }
                });
        AlertDialog alert = alt_bld.create();
        // Title for AlertDialog
        alert.setTitle("포토존 입성!");
        // Icon for AlertDialog
        alert.setCancelable(true);
        alert.show();
    }
}

package net.computeering.newschoolbus.SchoolManagePackage;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import net.computeering.newschoolbus.R;

public class SchoolMange_Activity extends AppCompatActivity {
    EditText notice;
    String text = "";
    Button btn_drive_car;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_school_mange_);

        notice = (EditText) findViewById(R.id.notice);
        btn_drive_car = (Button)findViewById(R.id.btn_drive_car);


        btn_drive_car.setOnClickListener(new View.OnClickListener() {//!!!
            public void onClick(View v) {
                Intent intent1 = new Intent(SchoolMange_Activity.this, ChooseCar_Activity.class);
                startActivity(intent1);
            }
        });
    }
}

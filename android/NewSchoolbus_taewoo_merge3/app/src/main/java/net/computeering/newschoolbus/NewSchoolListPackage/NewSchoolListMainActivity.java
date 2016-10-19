package net.computeering.newschoolbus.NewSchoolListPackage;

import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.graphics.drawable.Drawable;
import android.os.AsyncTask;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.DefaultItemAnimator;
import android.support.v7.widget.GridLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonArrayRequest;

import net.computeering.newschoolbus.DataPackage.SchoolData;
import net.computeering.newschoolbus.DataPackage.UserData;
import net.computeering.newschoolbus.MasterMainActivity;
import net.computeering.newschoolbus.R;
import net.computeering.newschoolbus.SchoolListPackage.ListData;
import net.computeering.newschoolbus.SchoolListPackage.SchoolListActivity;
import net.computeering.newschoolbus.TCP.ServerCheck;
import net.computeering.newschoolbus.TCP.TCP_SC;
import net.computeering.newschoolbus.TCP.TCP_Socket;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.Collections;

public class NewSchoolListMainActivity extends AppCompatActivity {

    private String TAG = NewSchoolListMainActivity.class.getSimpleName();
    private static final String endpoint = "http://api.androidhive.info/json/glide.json";
    private ArrayList<NewSchoolListImage> images;
    private ProgressDialog pDialog;
    private NewSchoolListGalleryAdapter mAdapter;
    private ListViewAdapter2 mAdapter2 = null;
    private RecyclerView recyclerView;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.newschoollist_activity_main);
//        Intent GCMRegActivity_Intent = new Intent(NewSchoolListMainActivity.this, NewGCMMainActivity.class);
//        startActivity(GCMRegActivity_Intent);

        recyclerView = (RecyclerView) findViewById(R.id.recycler_view);

        pDialog = new ProgressDialog(this);
        images = new ArrayList<>();
        mAdapter = new NewSchoolListGalleryAdapter(getApplicationContext(), images);

        RecyclerView.LayoutManager mLayoutManager = new GridLayoutManager(getApplicationContext(), 2);
        recyclerView.setLayoutManager(mLayoutManager);
        recyclerView.setItemAnimator(new DefaultItemAnimator());
        recyclerView.setAdapter(mAdapter);
        recyclerView.addOnItemTouchListener(new NewSchoolListGalleryAdapter.RecyclerTouchListener(getApplicationContext(), recyclerView, new NewSchoolListGalleryAdapter.ClickListener() {
            @Override
            public void onClick(View view, int position) {

                ListData mData = mAdapter2.mListData.get(position);
                SchoolData.schoolName = mData.schoolName;
                SchoolData.role = mData.role;

                (new SetList()).execute(new String[]{"2"});
                ServerCheck.showLoading(NewSchoolListMainActivity.this);


//                Bundle bundle = new Bundle();
//                bundle.putSerializable("images", images);
//                bundle.putInt("position", position);

                Toast.makeText(NewSchoolListMainActivity.this, " " +SchoolData.schoolName, Toast.LENGTH_LONG).show();
                //Toast.makeText(getApplicationContext(),position,Toast.LENGTH_SHORT).show();
                //FragmentTransaction ft = getSupportFragmentManager().beginTransaction();
                //SlideshowDialogFragment newFragment = SlideshowDialogFragment.newInstance();
                //newFragment.setArguments(bundle);
                //newFragment.show(ft, "slideshow");
            }

            @Override
            public void onLongClick(View view, int position) {

            }
        }));
        (new SetList()).execute(new String[]{"1"});
        ServerCheck.showLoading(this);
        //fetchImages();
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
                mAdapter2 = new ListViewAdapter2(NewSchoolListMainActivity.this);

                msg = "S_LIST" + TCP_SC._del + UserData.id + TCP_SC._del;
                TCP_Socket.socket.SendMsg(msg);

                for (; ; ) {
                    msg = TCP_Socket.socket.GetMsg();
                    if(msg.equals("100"))
                        return "100";
                    Log.e("SchoolList_test:  ", msg);
                    boolean out = false;
                    String MSGS[] = msg.split(TCP_SC._endDel);
                    images.clear();
                    for (int i = 0; i < MSGS.length; i++) {
                        String msgs[] = MSGS[i].split(TCP_SC._del);

                        if(i==0) {
                            if (!msgs[1].equals("0")) {
                                Log.e("SchoolList_test", msgs[1] + "  " + msgs[2]);
                                mAdapter2.addItem(null,
                                        msgs[1],
                                        msgs[2]);
                                images.add(new NewSchoolListImage(msgs[1],"http://knu.ac.kr/wbbs/img/intro/ui_emblem01.jpg","http://knu.ac.kr/wbbs/img/intro/ui_emblem01.jpg","http://knu.ac.kr/wbbs/img/intro/ui_emblem01.jpg","February 12, 2016"));
                            }
                            else{
                                out = true;
                            }
                        }
                        else{
                            if (!msgs[0].equals("0")) {
                                Log.e("SchoolList_test", msgs[0] + "  " + msgs[1]);
                                mAdapter2.addItem(null,
                                        msgs[0],
                                        msgs[1]);
                                images.add(new NewSchoolListImage(msgs[0], "http://knu.ac.kr/wbbs/img/intro/ui_emblem01.jpg", "http://knu.ac.kr/wbbs/img/intro/ui_emblem01.jpg", "http://knu.ac.kr/wbbs/img/intro/ui_emblem01.jpg", "February 12, 2016"));
                            }
                            else{
                                out = true;
                            }
                        }
                    }
                    if(out)
                        break;
                }
                ServerCheck.hideLoading();

                return "1";
            }
            if (type.compareTo("2") == 0) {
//                msg = "S_INFO"+TCP_SC._del+ SchoolData.schoolName+TCP_SC._del;
//                TCP_SC.SendMsg(msg);

                return "2";
            }

            return null;
        }

        @Override
        protected void onPostExecute(String result) {
            super.onPostExecute(result);

            if (result.compareTo("1") == 0) {
                recyclerView.setAdapter(mAdapter);
            }
            if (result.compareTo("2") == 0) {
                Intent SLA_GoToMasterMainActivity_Intent = new Intent(NewSchoolListMainActivity.this, MasterMainActivity.class);
                startActivity(SLA_GoToMasterMainActivity_Intent);
            }
            else if(result.compareTo("100") == 0) {
                Toast.makeText(NewSchoolListMainActivity.this, "연결이 불안정 합니다. 다시 시도해주세요!",
                        Toast.LENGTH_SHORT).show();
            }
        }

    }

    public class ListViewAdapter2 {
        public Context mContext = null;
        public ArrayList<ListData> mListData = new ArrayList<ListData>();

        public void addItem(Drawable icon, String mTitle, String mRole){
            ListData addInfo = null;
            addInfo = new ListData();
            addInfo.mIcon = icon;
            addInfo.schoolName = mTitle;
            addInfo.role = mRole;

            mListData.add(addInfo);
        }

        public ListViewAdapter2(Context mContext) {
            super();
            this.mContext = mContext;
        }

    }
}
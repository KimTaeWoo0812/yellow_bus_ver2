package net.computeering.newschoolbus.Attend_log_Package;

import android.content.Context;
import android.content.Intent;
import android.database.sqlite.SQLiteDatabase;
import android.graphics.Color;
import android.graphics.drawable.ColorDrawable;
import android.os.AsyncTask;
import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.support.v4.app.FragmentTransaction;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.ListView;
import android.widget.TextView;
import android.widget.Toast;

import com.roomorama.caldroid.CaldroidFragment;
import com.roomorama.caldroid.CaldroidListener;

import net.computeering.newschoolbus.CustomPreferences;
import net.computeering.newschoolbus.DataPackage.SchoolData;
import net.computeering.newschoolbus.DataPackage.UserData;
import net.computeering.newschoolbus.MasterMainActivity;
import net.computeering.newschoolbus.NewSchoolListPackage.NewSchoolListImage;
import net.computeering.newschoolbus.R;
import net.computeering.newschoolbus.TCP.ServerCheck;
import net.computeering.newschoolbus.TCP.TCP_SC;
import net.computeering.newschoolbus.TCP.TCP_Socket;

import java.sql.SQLException;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Calendar;
import java.util.Date;
import java.util.HashMap;

/**
 * Created by kimtaewoo on 2016-07-15.
 */
public class CaldroidSampleFragment extends Fragment {
    private boolean undo = false;
    private CaldroidFragment caldroidFragment;
    private CaldroidFragment dialogCaldroidFragment;
    ArrayList<OneOfList> listItem;
    ListView listView;
    public static CustomPreferences pref;
    public static ArrayList<OneOfList> getListItem = new ArrayList<OneOfList>();
    DBHelper db;
    public static SQLiteDatabase SQLite;


    /**
     * 여기서 캘린더 초기화부분 넣으면 된다
     */
    private void setCustomResourceForDates() {
        Calendar cal = Calendar.getInstance();

        // Min date is last 7 days
        cal.add(Calendar.DATE, -7);
        Date blueDate = cal.getTime();
        // Max date is next 7 days
        cal = Calendar.getInstance();
        cal.add(Calendar.DATE, 7);
        Date greenDate = cal.getTime();

        if (caldroidFragment != null) {
            ColorDrawable blue = new ColorDrawable(getResources().getColor(R.color.blue));
            ColorDrawable green = new ColorDrawable(Color.GREEN);
            caldroidFragment.setBackgroundDrawableForDate(blue, blueDate);
            caldroidFragment.setBackgroundDrawableForDate(green, greenDate);
            caldroidFragment.setTextColorForDate(R.color.white, blueDate);
            caldroidFragment.setTextColorForDate(R.color.white, greenDate);
        }
    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.activity_calendar, container, false);

        pref = new CustomPreferences(getActivity());
        SQLite = getActivity().openOrCreateDatabase(DBHelper.DB_NAME,DBHelper.DB_MODE,null);
        db = new DBHelper(getActivity(), SQLite);





        final SimpleDateFormat formatter = new SimpleDateFormat("yyyy-MM-dd");
        listItem = new  ArrayList<OneOfList>();


        (new SetList()).execute(new String[]{"1"});
        ServerCheck.showLoading(getActivity());

        // Setup caldroid fragment
        // **** If you want normal CaldroidFragment, use below line ****
//        caldroidFragment = new CaldroidFragment();

        // //////////////////////////////////////////////////////////////////////
        // **** This is to show customized fragment. If you want customized
        // version, uncomment below line ****
		 caldroidFragment = new CaldroidSampleCustomFragment();






        // Setup arguments

        // If Activity is created after rotation
        if (savedInstanceState != null) {
            caldroidFragment.restoreStatesFromKey(savedInstanceState,
                    "CALDROID_SAVED_STATE");
        }
        // If activity is created from fresh
        else {
            Bundle args = new Bundle();
            Calendar cal = Calendar.getInstance();
            args.putInt(CaldroidFragment.MONTH, cal.get(Calendar.MONTH) + 1);
            args.putInt(CaldroidFragment.YEAR, cal.get(Calendar.YEAR));
            args.putBoolean(CaldroidFragment.ENABLE_SWIPE, true);
            args.putBoolean(CaldroidFragment.SIX_WEEKS_IN_CALENDAR, true);

            // Uncomment this to customize startDayOfWeek
            // args.putInt(CaldroidFragment.START_DAY_OF_WEEK,
            // CaldroidFragment.TUESDAY); // Tuesday

            // Uncomment this line to use Caldroid in compact mode
            // args.putBoolean(CaldroidFragment.SQUARE_TEXT_VIEW_CELL, false);

            // Uncomment this line to use dark theme
//            args.putInt(CaldroidFragment.THEME_RESOURCE, com.caldroid.R.style.CaldroidDefaultDark);

            caldroidFragment.setArguments(args);
        }

//        setCustomResourceForDates();

        // Attach to the activity
        FragmentTransaction t = getActivity().getSupportFragmentManager().beginTransaction();
        t.replace(R.id.calendar1, caldroidFragment);
        t.commit();

        // Setup listener
        final CaldroidListener listener = new CaldroidListener() {

            @Override
            public void onSelectDate(Date date, View view) {
                Toast.makeText(getActivity(), "# " + formatter.format(date),
                        Toast.LENGTH_SHORT).show();

//                String dTime = formatter.format (date);
//                Log.i("### 버튼 클릭1", formatter.format(date));
                SetListView(formatter.format (date));



                caldroidFragment.setSelectedDates(date, date);
//                caldroidFragment.setShowNavigationArrows(false);
//                caldroidFragment.setEnableSwipe(false);

                caldroidFragment.refreshView();
                /**
                 * 여기 선택 이벤트 넣기
                 */
            }

            @Override
            public void onChangeMonth(int month, int year) {
//                String text = "month: " + month + " year: " + year;
//                Toast.makeText(getActivity(), text,Toast.LENGTH_SHORT).show();

                String strMonth="";
                if(month < 10)
                    strMonth = "0"+Integer.toString(month);
                else
                    strMonth = Integer.toString(month);

                getListItem.clear();
                getListItem = db.SelectDB(Integer.toString(year),strMonth);

            }

            @Override
            public void onLongClickDate(Date date, View view) {
//                Toast.makeText(getApplicationContext(),
//                        "Long click " + formatter.format(date),
//                        Toast.LENGTH_SHORT).show();
            }

            @Override
            public void onCaldroidViewCreated() {
//                if (caldroidFragment.getLeftArrowButton() != null) {
//                    Toast.makeText(getApplicationContext(),
//                            "Caldroid view is created", Toast.LENGTH_SHORT)
//                            .show();
//                }
            }

        };

        // Setup Caldroid
        caldroidFragment.setCaldroidListener(listener);

//        final TextView textView = (TextView) findViewById(R.id.textview);

//        final Button customizeButton = (Button) getActivity().findViewById(R.id.customize_button);
//
//        // Customize the calendar
//        customizeButton.setOnClickListener(new View.OnClickListener() {
//
//            @Override
//            public void onClick(View v) {
//                if (undo) {
//                    customizeButton.setText(getString(R.string.customize));
////                    textView.setText("");
//
//                    // Reset calendar
//                    caldroidFragment.clearDisableDates();
//                    caldroidFragment.clearSelectedDates();
//                    caldroidFragment.setMinDate(null);
//                    caldroidFragment.setMaxDate(null);
//                    caldroidFragment.setShowNavigationArrows(true);
//                    caldroidFragment.setEnableSwipe(true);
//                    caldroidFragment.refreshView();
//                    undo = false;
//                    return;
//                }
//
//                // Else
//                undo = true;
//                customizeButton.setText(getString(R.string.undo));
//                Calendar cal = Calendar.getInstance();
//
//                // Min date is last 7 days
//                cal.add(Calendar.DATE, -7);
//                Date minDate = cal.getTime();
//
//                // Max date is next 7 days
//                cal = Calendar.getInstance();
//                cal.add(Calendar.DATE, 14);
//                Date maxDate = cal.getTime();
//
//                // Set selected dates
//                // From Date
//                cal = Calendar.getInstance();
//                cal.add(Calendar.DATE, 2);
//                Date fromDate = cal.getTime();
//
//                // To Date
//                cal = Calendar.getInstance();
//                cal.add(Calendar.DATE, 3);
//                Date toDate = cal.getTime();
//
//                // Set disabled dates
//                ArrayList<Date> disabledDates = new ArrayList<Date>();
//                for (int i = 5; i < 8; i++) {
//                    cal = Calendar.getInstance();
//                    cal.add(Calendar.DATE, i);
//                    disabledDates.add(cal.getTime());
//                }
//
//                // Customize
//                caldroidFragment.setMinDate(minDate);
//                caldroidFragment.setMaxDate(maxDate);
//                caldroidFragment.setDisableDates(disabledDates);
//                caldroidFragment.setSelectedDates(fromDate, toDate);
//                caldroidFragment.setShowNavigationArrows(false);
//                caldroidFragment.setEnableSwipe(false);
//
//                caldroidFragment.refreshView();
//
//                // Move to date
//                // cal = Calendar.getInstance();
//                // cal.add(Calendar.MONTH, 12);
//                // caldroidFragment.moveToDate(cal.getTime());
//
//                String text = "Today: " + formatter.format(new Date()) + "\n";
//                text += "Min Date: " + formatter.format(minDate) + "\n";
//                text += "Max Date: " + formatter.format(maxDate) + "\n";
//                text += "Select From Date: " + formatter.format(fromDate)
//                        + "\n";
//                text += "Select To Date: " + formatter.format(toDate) + "\n";
//                for (Date date : disabledDates) {
//                    text += "Disabled Date: " + formatter.format(date) + "\n";
//                }
//
////                textView.setText(text);
//            }
//        });

//        Button showDialogButton = (Button) getActivity().findViewById(R.id.show_dialog_button);
//
//        final Bundle state = savedInstanceState;
//        showDialogButton.setOnClickListener(new View.OnClickListener() {
//
//            @Override
//            public void onClick(View v) {
//                // Setup caldroid to use as dialog
//                dialogCaldroidFragment = new CaldroidFragment();
//                dialogCaldroidFragment.setCaldroidListener(listener);
//
//                // If activity is recovered from rotation
//                final String dialogTag = "CALDROID_DIALOG_FRAGMENT";
//                if (state != null) {
//                    dialogCaldroidFragment.restoreDialogStatesFromKey(
//                            getActivity().getSupportFragmentManager(), state,
//                            "DIALOG_CALDROID_SAVED_STATE", dialogTag);
//                    Bundle args = dialogCaldroidFragment.getArguments();
//                    if (args == null) {
//                        args = new Bundle();
//                        dialogCaldroidFragment.setArguments(args);
//                    }
//                } else {
//                    // Setup arguments
//                    Bundle bundle = new Bundle();
//                    // Setup dialogTitle
//                    dialogCaldroidFragment.setArguments(bundle);
//                }
//
//                dialogCaldroidFragment.show(getActivity().getSupportFragmentManager(),
//                        dialogTag);
//            }
//        });

        return view;
    }

    /**
     * Save current states of the Caldroid here
     */
    @Override
    public void onSaveInstanceState(Bundle outState) {
        // TODO Auto-generated method stub
        super.onSaveInstanceState(outState);

        if (caldroidFragment != null) {
            caldroidFragment.saveStatesToKey(outState, "CALDROID_SAVED_STATE");
        }

        if (dialogCaldroidFragment != null) {
            dialogCaldroidFragment.saveStatesToKey(outState,
                    "DIALOG_CALDROID_SAVED_STATE");
        }
    }

    public void SetListView(String ChooseDate){
        listItem.clear();

//        Log.i("### 버튼 클릭2 SetListView", ""+getListItem.size());

        /**
         * 여기서 listItem을 채우면 된다.
         */
        OneOfList list;
        for(int i=0;i<getListItem.size();i++){
            if(ChooseDate.equals(getListItem.get(i).date)){
                list = new OneOfList(getListItem.get(i));
                listItem.add(list);
            }
        }

//        OneOfList list = new OneOfList("안뇽?!",ChooseDate);
//        listItem.add(list);
//        listItem.add(list);


        listView = (ListView) getActivity().findViewById(R.id.listView);
        ListAdapter adapter = new ListAdapter(getActivity(), 0, listItem);
        listView.setAdapter(adapter);

        listView.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> parent, View view,
                                    int position, long id) {
            }
        });


    }

    class ListAdapter  extends ArrayAdapter<OneOfList> {
        Context context;

        public ListAdapter(Context context, int resource,
                           ArrayList<OneOfList> noticeData) {
            super(context, resource, noticeData);
            this.context = context;
        }
        @Override
        public View getView(int position, View convertView, ViewGroup parent) {
            LayoutInflater inflater = (LayoutInflater) context.getSystemService(context.LAYOUT_INFLATER_SERVICE);
            View rowView = inflater.inflate(R.layout.adapter_list_calender,
                    null, true);

            TextView text = (TextView) rowView.findViewById(R.id.text);
            TextView date = (TextView) rowView.findViewById(R.id.date);
            text.setText(listItem.get(position).text);
            date.setText(listItem.get(position).date);

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

                String standardDate = pref.getValue(pref.DB_STANDARD_DATE,"");
                if(standardDate.equals("")){
                    standardDate = "2000-01-01";
                }

                msg = "LOG" + TCP_SC._del + UserData.id + TCP_SC._del + SchoolData.schoolName + TCP_SC._del + standardDate + TCP_SC._del;
                TCP_Socket.socket.SendMsg(msg);

                getListItem.clear();
                for (; ; ) {
                    msg = TCP_Socket.socket.GetMsg();
                    if (msg.equals("100"))
                        return "100";

                    boolean out = false;
                    String MSGS[] = msg.split(TCP_SC._endDel);
                    for (int i = 0; i < MSGS.length; i++) {
                        String msgs[] = MSGS[i].split(TCP_SC._del);

                        if (i == 0) {
                            if (!msgs[1].equals("0")) {
                                String[] strTemp = msgs[2].split(" ");
//                                Log.e("### log getMsg", msgs[1] + "  " + strTemp[0]);
                                //getListItem.add(new OneOfList(msgs[1], strTemp[0]));
                                try {
                                    db.InsertDB(msgs[1], strTemp[0]);
                                } catch (SQLException e) {
                                    e.printStackTrace();
                                }

                            } else {
                                out = true;
                            }
                        } else {
                            if (!msgs[0].equals("0")) {
                                String[] strTemp = msgs[1].split(" ");
//                                Log.e("### log getMsg", msgs[0] + "  " + strTemp[0]);
                                //getListItem.add(new OneOfList(msgs[0], strTemp[0]));
                                try {
                                    db.InsertDB(msgs[0], strTemp[0]);
                                } catch (SQLException e) {
                                    e.printStackTrace();
                                }

                            } else {
                                out = true;
                            }
                        }
                    }
                    if (out)
                        break;
                }
//                Log.e("### log getMsg size", "" + getListItem.size());

                // 0에 년, 1에 달
                String[] currentDate = GetDate().split("-");
                getListItem = db.SelectDB(currentDate[0],currentDate[1]);

                /**
                 * 여기서 getListItem에 받아온걸 넣고있는데
                 * 거기가 아니라 새로 만든곳에 넣어서
                 * 그걸 DB에 먼저 insert 하고,
                 * 커밋 하고,
                 * 받아와서 getListItem에 넣게 만들어야 된다
                 *
                 */

                return "1";
            }
            return null;
        }

        @Override
        protected void onPostExecute(String result) {
            super.onPostExecute(result);

            TCP_Socket.socket.CloseSocket();
            ServerCheck.hideLoading();

        }
    }
    private String GetDate() {
        long time = System.currentTimeMillis();
        SimpleDateFormat f = new SimpleDateFormat("yyyy-MM-dd");

//        Log.i("###time===",f.format(new Date(time)));

        return f.format(new Date(time));
    }
}

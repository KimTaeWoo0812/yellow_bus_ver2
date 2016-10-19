package net.computeering.newschoolbus.RealLogPackage;


import android.content.Context;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteException;
import android.os.Bundle;
import android.os.Handler;
import android.support.v4.app.Fragment;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.AbsListView;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.GridView;
import android.widget.LinearLayout;
import android.widget.ListAdapter;
import android.widget.ListView;
import android.widget.RelativeLayout;
import android.widget.TextView;
import android.widget.Toast;

import net.computeering.newschoolbus.R;

import java.text.DateFormat;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.GregorianCalendar;
import java.util.HashMap;
import java.util.List;
import java.util.Locale;

/**
 * A simple {@link Fragment} subclass.
 */
public class Reallog_CalendarViewFragment extends Fragment {
    private TextView stickyView;
    private ListView stickyListView;
    private View heroImageView;

    private View stickyViewSpacer;

    public GregorianCalendar month, itemmonth;// new_log_calendar instances.

    public Reallog_CalendarAdapter adapter;// adapter instance
    public Handler handler;// for grabbing some event values for showing the dot
    // marker.
    public ArrayList<String> items; // container to store new_log_calendar items which
    // needs showing the event marker
    ArrayList<String> event;
    LinearLayout rLayout;
    ArrayList<String> date;
    ArrayList<String> desc;

    //	//DB테스트
	private static final String TAG_LOGDATE = "logdate";
	private static final String TAG_ACADEMY = "academy";
	private final String dbName = "yellowbus";
	private final String tableName = "log";
	private final String[] logdate = new String[]{"2016-07-20", "2016-07-20", "2016-07-20",  "2016-07-20",  "2016-07-20",  "2016-07-20",  "2016-07-20",  "2016-07-20",  "2016-07-20",  "2016-07-20","2016-07-20", "2016-07-20", "2016-07-20",  "2016-07-20",  "2016-07-20",  "2016-07-20",  "2016-07-20",  "2016-07-20",  "2016-07-20",  "2016-07-20", "2016-07-21", "2016-07-21"};
	private final String[] academy = new String[]{"동은학원입장","동은학원퇴장", "삼성학원입장","삼성학원퇴장", "LG학원입장", "LG학원퇴장", "어린이집학원입장", "어린이집학원퇴장", "어린이집학원도망", "미술학원입장", "미술학원퇴장", "미술학원숙제", "동은학원입장","동은학원퇴장", "삼성학원입장","삼성학원퇴장", "LG학원입장", "LG학원퇴장", "어린이집학원입장", "어린이집학원퇴장", "어린이집학원도망", "미술학원입장"};

    ArrayList<HashMap<String, String>> personList;
	ListView list;
	SQLiteDatabase sampleDB = null;
	ListAdapter listadapter;
//	//DB테스트 끝
    public Reallog_CalendarViewFragment() {
        // Required empty public constructor
    }


    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        View cv = inflater.inflate( R.layout.new_log_calendar, container, false );
        //Fragment통합 시작 - 리스트뷰 부
        /* Initialise list view, hero image, and sticky view */
        stickyListView = (ListView) cv.findViewById(R.id.stickyListView);
        heroImageView = cv.findViewById(R.id.heroImageView);
        stickyView = (TextView) cv.findViewById(R.id.stickyView);

        /* Inflate list header layout */
        LayoutInflater inflater2 = (LayoutInflater) getActivity().getSystemService(Context.LAYOUT_INFLATER_SERVICE);
        View listHeader = inflater2.inflate(R.layout.list_header, null);
        stickyViewSpacer = listHeader.findViewById(R.id.stickyViewPlaceholder);
        heroImageView = listHeader.findViewById(R.id.heroImageView);

        /* Add list view header */
        stickyListView.addHeaderView(listHeader);

        /* Handle list View scroll events */
        stickyListView.setOnScrollListener(new AbsListView.OnScrollListener() {

            @Override
            public void onScrollStateChanged(AbsListView view, int scrollState) {
            }

            @Override
            public void onScroll(AbsListView view, int firstVisibleItem, int visibleItemCount, int totalItemCount) {

                /* Check if the first item is already reached to top.*/
                if (stickyListView.getFirstVisiblePosition() == 0) {
                    View firstChild = stickyListView.getChildAt(0);
                    int topY = 0;
                    if (firstChild != null) {
                        topY = firstChild.getTop();
                    }

                    int heroTopY = stickyViewSpacer.getTop();
                    stickyView.setY(Math.max(0, heroTopY + topY));

                    /* Set the image to scroll half of the amount that of ListView */
                    // heroImageView.setY(topY * 0.5f);
                }
            }
        });


        /* Populate the ListView with sample data */
        List<String> modelList = new ArrayList<>();
        for (int i = 0; i < 20; i++) {
            modelList.add("List item " + i);
        }

        ArrayAdapter stickyAdapter = new ArrayAdapter(getActivity(), R.layout.list_row, modelList);
        stickyListView.setAdapter(stickyAdapter);

        //Fragment통합 끝 - 리스트뷰 부

        // Inflate the layout for this fragment
        Locale.setDefault(Locale.US);

        rLayout = (LinearLayout) listHeader.findViewById(R.id.text);
        month = (GregorianCalendar) GregorianCalendar.getInstance();
        itemmonth = (GregorianCalendar) month.clone();

        items = new ArrayList<String>();

        adapter = new Reallog_CalendarAdapter(getActivity(), month);

        GridView gridview = (GridView) listHeader.findViewById(R.id.gridview);
        gridview.setAdapter(adapter);

        handler = new Handler();
        handler.post(calendarUpdater);

        TextView title = (TextView) listHeader.findViewById(R.id.title);
        title.setText(android.text.format.DateFormat.format("MMMM yyyy", month));

        RelativeLayout previous = (RelativeLayout) listHeader.findViewById(R.id.previous);
        //DB테스트
		list = (ListView) getActivity().findViewById(R.id.listView);

		try {
			sampleDB = getActivity().openOrCreateDatabase(dbName, Context.MODE_PRIVATE, null);

			//테이블이 존재하지 않으면 새로 생성합니다.
			sampleDB.execSQL("CREATE TABLE IF NOT EXISTS " + tableName
					+ " (logdate VARCHAR(40), academy VARCHAR(40) );");

			//테이블이 존재하는 경우 기존 데이터를 지우기 위해서 사용합니다.
			sampleDB.execSQL("DELETE FROM " + tableName);


			//새로운 데이터를 테이블에 집어넣습니다..
			for (int i = 0; i < logdate.length; i++) {
				sampleDB.execSQL("INSERT INTO " + tableName
						+ " (logdate, academy)  Values ('" + logdate[i] + "', '" + academy[i] + "');");
			}

			sampleDB.close();

		} catch (SQLiteException se) {
			Toast.makeText(getActivity(), "SQL 에러 메시지 : " + se.getMessage(), Toast.LENGTH_LONG).show();
			Log.e("SQL ERR ", se.getMessage());
		}

        //DB테스트끝
        //달 이동 버튼
        previous.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View v) {
                setPreviousMonth();
                refreshCalendar();
            }
        });

        RelativeLayout next = (RelativeLayout) listHeader.findViewById(R.id.next);
        next.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View v) {
                setNextMonth();
                refreshCalendar();

            }
        });

        gridview.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            public void onItemClick(AdapterView<?> parent, View v,
                                    int position, long id) {
                // removing the previous view if added
                if (((LinearLayout) rLayout).getChildCount() > 0) {
                    ((LinearLayout) rLayout).removeAllViews();
                }
                Log.e("Seongho", "parent : " + parent + " view : " + v + "position : " + position + " id : " + id);
                desc = new ArrayList<String>();
                date = new ArrayList<String>();
                Log.e("Seongho", "desc : " + desc + " date : " + date);
                ((Reallog_CalendarAdapter) parent.getAdapter()).setSelected(v);


                Log.i("##cal  onItemClick", "# " + position);
                Log.i("##cal  onItemClick", "# " + Reallog_CalendarAdapter.dayString
                        .get(position));

                String selectedGridDate = Reallog_CalendarAdapter.dayString
                        .get(position);



                String[] separatedTime = selectedGridDate.split("-");
                String gridvalueString = separatedTime[2].replaceFirst("^0*",
                        "");// taking last part of date. ie; 2 from 2012-12-02.
                int gridvalue = Integer.parseInt(gridvalueString);
                Log.e("Seongho", "selectedGridDate : " + selectedGridDate + " separatedTime : " + separatedTime + "gridvalueString : " + gridvalueString + " gridvalue : " + gridvalue);
                // navigate to next or previous month on clicking offdays.
                if ((gridvalue > 10) && (position < 8)) {
                    setPreviousMonth();
                    refreshCalendar();
                } else if ((gridvalue < 7) && (position > 28)) {
                    setNextMonth();
                    refreshCalendar();
                }
                //((Reallog_CalendarAdapter) parent.getAdapter()).setSelected(v);

                for (int i = 0; i < Reallog_Utility.startDates.size(); i++) {
                    if (Reallog_Utility.startDates.get(i).equals(selectedGridDate)) {
                        desc.add(Reallog_Utility.nameOfEvent.get(i));
                    }
                }

                if (desc.size() > 0) {
                    List<String> modelList = new ArrayList<>();
                    for (int i = 0; i < desc.size(); i++) {
                        //TextView rowTextView = new TextView(getActivity());

                        // set some properties of rowTextView or something
                        //rowTextView.setText("Event:" + desc.get(i));
                        //rowTextView.setTextColor(Color.BLACK);
                        modelList.add("List item " + i + desc.get(i));


                        // add the textview to the linearlayout
                        //rLayout.addView(rowTextView);

                    }
                    //((Reallog_CalendarAdapter) parent.getAdapter()).setSelected(v);
                    ArrayAdapter stickyAdapter = new ArrayAdapter(getActivity(), R.layout.list_row, modelList);
                    stickyListView.setAdapter(stickyAdapter);
                }
                desc = null;

            }

        });

        return cv;
    }

    protected void setNextMonth() {
        if (month.get(GregorianCalendar.MONTH) == month
                .getActualMaximum(GregorianCalendar.MONTH)) {
            month.set((month.get(GregorianCalendar.YEAR) + 1),
                    month.getActualMinimum(GregorianCalendar.MONTH), 1);
        } else {
            month.set(GregorianCalendar.MONTH,
                    month.get(GregorianCalendar.MONTH) + 1);
        }

    }

    protected void setPreviousMonth() {
        if (month.get(GregorianCalendar.MONTH) == month
                .getActualMinimum(GregorianCalendar.MONTH)) {
            month.set((month.get(GregorianCalendar.YEAR) - 1),
                    month.getActualMaximum(GregorianCalendar.MONTH), 1);
        } else {
            month.set(GregorianCalendar.MONTH,
                    month.get(GregorianCalendar.MONTH) - 1);
        }

    }

    protected void showToast(String string) {
        Toast.makeText(getActivity(), string, Toast.LENGTH_SHORT).show();

    }

    public void refreshCalendar() {
        TextView title = (TextView) getActivity().findViewById(R.id.title);

        adapter.refreshDays();
        adapter.notifyDataSetChanged();
        handler.post(calendarUpdater); // generate some new_log_calendar items

        title.setText(android.text.format.DateFormat.format("MMMM yyyy", month));
    }

    public Runnable calendarUpdater = new Runnable() {

        @Override
        public void run() {
            items.clear();

            // Print dates of the current week
            DateFormat df = new SimpleDateFormat("yyyy-MM-dd", Locale.US);
            String itemvalue;
            event = Reallog_Utility.readCalendarEvent(getActivity());
            Log.d("=====Event====", event.toString());
            Log.d("=====Date ARRAY====", Reallog_Utility.startDates.toString());

            for (int i = 0; i < Reallog_Utility.startDates.size(); i++) {
                itemvalue = df.format(itemmonth.getTime());
                itemmonth.add(GregorianCalendar.DATE, 1);
                items.add(Reallog_Utility.startDates.get(i).toString());
            }
            adapter.setItems(items);
            adapter.notifyDataSetChanged();
        }
    };
}

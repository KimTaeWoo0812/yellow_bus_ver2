package net.computeering.newschoolbus.Attend_log_Package;

import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;
import android.util.Log;
import android.widget.ListAdapter;
import android.widget.ListView;

import java.sql.SQLException;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Calendar;
import java.util.HashMap;

/**
 * Created by kimtaewoo on 2016-07-15.
 */
public class DBHelper  extends SQLiteOpenHelper {
    public static final String DB_NAME = "yellowbus_test";
    public static final String TABLE_NAME = "addend_log_test";
    private static final String COLUM_TEXT = "text";
    private static final String COLUM_DATE = "date";
    private static final int DB_VERSION = 1;

    public static int DB_MODE = Context.MODE_PRIVATE;
    private static SQLiteDatabase db;

    public DBHelper(Context context, SQLiteDatabase db) {
        super(context, DB_NAME, null, DB_VERSION);
        // TODO Auto-generated constructor stub \
        this.db = db;

        String sql = "create table IF NOT EXISTS " + TABLE_NAME +
                "(" + COLUM_TEXT + " VARCHAR(40), " + COLUM_DATE + " VARCHAR(20), primary key("+COLUM_TEXT+","+COLUM_DATE+"));";
        db.execSQL(sql);
//        Log.i("###dbtest DBHelper", TABLE_NAME + "Table created");
        this.db = db;
    }

    @Override
    public void onCreate(SQLiteDatabase db) {
        // TODO Auto-generated method stub
        //db = context.openOrCreateDatabase(DB_NAME, Context.MODE_PRIVATE, null);
//        Log.i("###dbtest onCreate", TABLE_NAME + "Table created");
//        String sql = "create table IF NOT EXISTS " + TABLE_NAME +
//                "(" + COLUM_TEXT + " VARCHAR(40) primary key , " + COLUM_DATE + " VARCHAR(20) primary key);";
//        db.execSQL(sql);
//        this.db = db;
//        Log.i("###dbtest", TABLE_NAME + "Table created");
    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {
//        String sql = "drop table if exists student";
//        db.execSQL(sql);
//        onCreate(db); // 테이블을 지웠으므로 다시 테이블을 만들어주는 과정
    }

    public void InsertDB(String text, String date) throws SQLException {
//        Log.i("###dbtest_InsertDB", text+"   "+date);
        ContentValues values = new ContentValues();
        values.put(COLUM_TEXT, text);
        values.put(COLUM_DATE, date);
        db.beginTransaction();
        db.insert(TABLE_NAME, null, values);

        db.setTransactionSuccessful();
        db.endTransaction();
//    db.execSQL("INSERT INTO "+TABLE_NAME+" VALUES('"+COLUM_TEXT+"','"+COLUM_DATE+"');");
    }




    public ArrayList<OneOfList> SelectDB(String year, String month){
        ArrayList<OneOfList> list = new ArrayList<OneOfList>();
        OneOfList oneOfList = null;
        Calendar cal = Calendar.getInstance();


        String query = "SELECT text, date FROM "+TABLE_NAME+
                " WHERE date < strftime('%Y-%m-%d', '"+year+"-"+month+"-"+cal.getMaximum(Calendar.DAY_OF_MONTH)+"') " +
                "AND date > strftime('%Y-%m-%d', '"+year+"-"+month+"-01');";
        //strftime('%Y-%m-%d', '"+year+"-"+(month+1)+"-23')
//        Log.i("###dbtest_SelectDB", query);

        Cursor cursor = db.rawQuery(query, null);
        cursor.moveToFirst();

        while(cursor.moveToNext()){
            oneOfList = new OneOfList(cursor.getString(0), cursor.getString(1));
//            Log.i("###dbtest_SelectDB", oneOfList.date + "   "+oneOfList.text);
            list.add(oneOfList);
        }
        //list 마지막에 있는 거의 날짜가 기준 날짜가 되면 된다.
        if(list.size() > 0) {
            OneOfList oTemp = list.get(list.size() - 1);
            CaldroidSampleFragment.pref.put(CaldroidSampleFragment.pref.DB_STANDARD_DATE, oTemp.date);
        }



        //test code
//        query = "SELECT text, date FROM "+TABLE_NAME+" where date < strftime('%Y-%m-%d', '2016-07-25');";
//        //strftime('%Y-%m-%d', '"+year+"-"+(month+1)+"-23')
//        Log.i("###dbtest_SelectDB", query);
//        cursor = db.rawQuery(query, null);
//        cursor.moveToFirst();
//        while(cursor.moveToNext()){
//            Log.i("###dbtest_SelectDB_test", cursor.getString(0)+"   "+ cursor.getString(1));
//        }


        return list;
    }
}

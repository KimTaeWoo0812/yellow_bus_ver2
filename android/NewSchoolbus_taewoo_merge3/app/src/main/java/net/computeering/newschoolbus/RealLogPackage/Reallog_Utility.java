/*
 * Copyright (C) 2014 Mukesh Y authors
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
package net.computeering.newschoolbus.RealLogPackage;

import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteException;
import android.database.sqlite.SQLiteOpenHelper;
import android.util.Log;
import android.widget.ListAdapter;
import android.widget.ListView;
import android.widget.SimpleAdapter;
import android.widget.Toast;

import net.computeering.newschoolbus.R;

import java.sql.SQLException;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Calendar;
import java.util.Date;
import java.util.HashMap;

/**
 * @author Mukesh Y
 */
public class Reallog_Utility {
	public static ArrayList<String> nameOfEvent = new ArrayList<String>(); //학원 이름
	public static ArrayList<String> startDates = new ArrayList<String>(); // 날짜
	//DB테스트
	private static final String COLUMN_TEXT = "text";
	private static final String COLUMN_DATE = "date";
	public static final String DB_NAME = "yellowbus";
	public static final String TABLE_NAME = "addend_log";
//	public static final String[] logdate = new String[]{"2016-05-20", "2016-05-20", "2016-05-21"};
//	public static final String[] academy = new String[]{"동은학원", "삼성학원", "LG학원"};
	public static ArrayList<HashMap<String, String>> personList;
	public static ListView list;
	public static SQLiteDatabase sampleDB = null;
	public static ListAdapter listadapter;
	public static SQLiteDatabase ReadDB;
	public static int DB_MODE = Context.MODE_PRIVATE;

	//DB테스트 끝
	public static ArrayList<String> readCalendarEvent(Context context) {
		//리스트뷰시작

		ReadDB = context.openOrCreateDatabase(DB_NAME, Context.MODE_PRIVATE, null);
		String sql = "create table IF NOT EXISTS " + TABLE_NAME +
				"("+COLUMN_TEXT+" VARCHAR(40) , " + COLUMN_DATE+" VARCHAR(20));";
		ReadDB.execSQL(sql);
		Log.i("databasetest", TABLE_NAME + "Table created");

		try {
			insertDB("test1","2016-07-15");
			insertDB("test1","2016-07-15");
			insertDB("test1","2016-07-14");
			insertDB("test1","2016-07-13");


			personList = new ArrayList<HashMap<String, String>>();

			//SELECT문을 사용하여 테이블에 있는 데이터를 가져옵니다..
			//Cursor c = ReadDB.rawQuery("SELECT * FROM " + tableName, null);
			Cursor c = ReadDB.rawQuery("SELECT * FROM " + TABLE_NAME, null);
			if (c != null) {
				if (c.moveToFirst()) {
					do {
						//테이블에서 두개의 컬럼값을 가져와서
						String text = c.getString(c.getColumnIndex(COLUMN_TEXT));
						String date = c.getString(c.getColumnIndex(COLUMN_DATE));

						//HashMap에 넣
						HashMap<String, String> persons = new HashMap<String, String>();

						persons.put(COLUMN_TEXT, text);
						persons.put(COLUMN_DATE, date);

						//ArrayList에 추가합니다..
						personList.add(persons);

					} while (c.moveToNext());
				}
			}

			ReadDB.close();


			//새로운 apapter를 생성하여 데이터를 넣은 후..
			listadapter = new SimpleAdapter(
					context, personList, R.layout.new_log_list_item,
					new String[]{COLUMN_TEXT, COLUMN_DATE},
					new int[]{R.id.text, R.id.date}
			);


			//화면에 보여주기 위해 Listview에 연결합니다.
//			list.setAdapter(listadapter);



		} catch (SQLiteException se) {
			Toast.makeText(context, se.getMessage(), Toast.LENGTH_LONG).show();
			Log.e("", se.getMessage());
		}
		//리스트뷰끝

		SQLiteDatabase ReadDB = context.openOrCreateDatabase(DB_NAME, Context.MODE_PRIVATE, null);
		//Cursor cursor = context.getContentResolver().query(Uri.parse("content://com.android.new_log_calendar/events"), new String[]{"calendar_id", "title", "description", "dtstart", "dtend", "eventLocation"}, null, null, null);
		Cursor cursor = ReadDB.rawQuery("SELECT * FROM " + TABLE_NAME, null);
		cursor.moveToFirst();
		// fetching calendars name
		String CNames[] = new String[cursor.getCount()];


		nameOfEvent.clear();
		startDates.clear();
		for (int i = 0; i < CNames.length; i++) {
			nameOfEvent.add(cursor.getString(1));
			startDates.add(cursor.getString(0));
			Log.e("Seongho", "getDate : " + cursor.getString(0));
			//endDates.add(getDate(Long.parseLong(cursor.getString(4))));
			//descriptions.add(cursor.getString(2));
			CNames[i] = cursor.getString(1);
			cursor.moveToNext();
		}
		return nameOfEvent;
	}
	public static void insertDB(String text, String date){
		ContentValues values = new ContentValues();
		values.put(COLUMN_TEXT, text);
		values.put(COLUMN_DATE, date);
		ReadDB.insert(TABLE_NAME, null, values);
	}

	public static String getDate(long milliSeconds) {
		SimpleDateFormat formatter = new SimpleDateFormat("yyyy-MM-dd");
		Calendar calendar = Calendar.getInstance();
		calendar.setTimeInMillis(milliSeconds);
		return formatter.format(calendar.getTime());
	}
}

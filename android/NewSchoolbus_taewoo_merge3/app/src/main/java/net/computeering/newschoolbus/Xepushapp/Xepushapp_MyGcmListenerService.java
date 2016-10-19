/**
 * Copyright 2015 Google Inc. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

package net.computeering.newschoolbus.Xepushapp;

import android.app.NotificationManager;
import android.app.PendingIntent;
import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.media.Ringtone;
import android.media.RingtoneManager;
import android.net.Uri;
import android.os.Bundle;
import android.os.Vibrator;
import android.preference.PreferenceManager;
import android.support.v4.app.NotificationCompat;
import android.util.Log;

import com.google.android.gms.gcm.GcmListenerService;

import net.computeering.newschoolbus.R;

import java.util.Random;

public class Xepushapp_MyGcmListenerService extends GcmListenerService {

    private static final String TAG = "Xepushapp_MyGcmListenerService";
    String member_srl;
    String nick_name;
    String sort_link;
    boolean statuss;
    boolean statusv;

    public Xepushapp_MyGcmListenerService(){
        Log.i("#!#!","Xepushapp_MyGcmListenerService");

    }



    /**
     * Called when message is received.
     *
     * @param from SenderID of the sender.
     * @param data Data bundle containing message data as key/value pairs.
     *             For Set of keys use data.keySet().
     */
    // [START receive_message]
    @Override
    public void onMessageReceived(String from, Bundle data) {
        Log.i("###wep테스트 ","onMessageReceived");
        Log.i("###wep테스트 ",""+from);
        Log.i("###wep테스트 ",""+data.getString("message"));
        String message = data.getString("message");
        String board = data.getString("board");
        String dmember = data.getString("dmember");
        String cmember = data.getString("cmember");
        String ccmember = data.getString("ccmember");
        String sort = data.getString("sort");
        String address = data.getString("address");
//        Log.e(TAG, "From: " + from);
//        Log.e(TAG, "Message: " + message +" board : " + board + " dmember : " + dmember + " cmember : " + cmember + " sort : " + sort + " address : " + address);


        /**
         * Production applications would usually process the message here.
         * Eg: - Syncing with server.
         *     - Store message in local database.
         *     - Update UI.
         */

        /**
         * In some cases it may be useful to show a notification indicating to the user
         * that a message was received.
         */
        sendNotification(message,board,dmember,cmember,ccmember,sort,address);
    }
    // [END receive_message]

    /**
     * Create and show a simple notification containing the received GCM message.
     *
     *  GCM message received.
     */
    private void sendNotification(String msg,String board,String dmember,String cmember,String ccmember,String sort,String address) {
        final SharedPreferences prefs = PreferenceManager.getDefaultSharedPreferences(this);

        boolean status1=false;
        boolean status2=false;
        boolean status3=false;
        boolean status4=false;
        boolean status5=false;
        boolean status6=false;
        boolean status7=false;
        statuss=false;
        statusv=false;
        String title;

        if (prefs.contains("soundonoff")) {
            statuss=Boolean.parseBoolean(prefs.getString("soundonoff", ""));
        }
        if (prefs.contains("vibonoff")) {
            statusv=Boolean.parseBoolean(prefs.getString("vibonoff", ""));
        }
        if(prefs.contains("setting")) {
            String setting = prefs.getString("setting", "");
            String[] array_setting = setting.split("-");
            status1 = Boolean.parseBoolean(array_setting[0]);
            status2 = Boolean.parseBoolean(array_setting[1]);
            status3 = Boolean.parseBoolean(array_setting[2]);
            status4 = Boolean.parseBoolean(array_setting[3]);
            status5 = Boolean.parseBoolean(array_setting[4]);
            status6 = Boolean.parseBoolean(array_setting[5]);
            status7 = Boolean.parseBoolean(array_setting[6]);
        }
        if (prefs.contains("member_srl_origin")) {
            member_srl = prefs.getString("member_srl_origin", "");
        }
        if (prefs.contains("nick_name_origin")) {
            nick_name = prefs.getString("nick_name_origin", "");
        }

        switch(sort){
            case "1" : title= board + getString(R.string.gcm_newdoc);
                Noti(title,msg,address,sort);
                break;

            case "2" :
                String[] array = cmember.split("-");
                boolean comment=false;
                for(int i=0; i< array.length; i++){
                    if(array[i].equals(member_srl)) comment=true;
                }

                if (dmember.equals(member_srl)) {
                    title = nick_name + getString(R.string.gcm_newcomdoc);
                    Noti(title, msg, address, sort);
                    break;
                }else if (ccmember.equals(member_srl)) {
                    title = nick_name + getString(R.string.gcm_newcomcom);
                    Noti(title, msg, address, sort);
                    break;
                }else if(comment) {
                    title = nick_name + getString(R.string.gcm_newcomdoccom);
                    Noti(title,msg,address,sort);
                    break;
                }else{
                    title= board + getString(R.string.gcm_newcom);
                    Noti(title,msg,address,sort);
                    break;
                }

            case "3" : title= getString(R.string.gcm_newmsg);
                Noti(title,msg,address,sort);
                break;

            case "4" : title= getString(R.string.gcm_test);
                Noti(title,msg,address,sort);
                break;

			case "11" :
                if(status6){
                    title = board;
                    Noti(title,msg,address,sort);
                }
                break;
        }
    }

    private void Noti(String title,String msg,String address,String sort){

        Intent intent = new Intent(this, Xepushapp_MainActivity.class);
        if (sort.equals("3")){
            sort_link="msg";
        }else if(sort.equals("11")) {
            sort_link = "notice";
        }else{
            sort_link="document";
		}

        intent.putExtra("sort", sort_link);
        intent.putExtra("address", address);

        intent.addFlags(Intent.FLAG_ACTIVITY_CLEAR_TOP);
        int dummyuniqueInt = new Random().nextInt(543254);
        PendingIntent pendingIntent = PendingIntent.getActivity(this, dummyuniqueInt, intent,
                PendingIntent.FLAG_ONE_SHOT);

        NotificationCompat.Builder notificationBuilder = new NotificationCompat.Builder(this)
                .setSmallIcon(R.drawable.ic_stat_gcm)
                .setContentTitle(title)
                .setContentText(msg)
                .setAutoCancel(true)
                .setContentIntent(pendingIntent);

        NotificationManager notificationManager =
                (NotificationManager) getSystemService(Context.NOTIFICATION_SERVICE);

        notificationManager.notify(0, notificationBuilder.build());

        if(statuss){
            Uri defaultSoundUri= RingtoneManager.getDefaultUri(RingtoneManager.TYPE_NOTIFICATION);
            Ringtone ring = RingtoneManager.getRingtone(getApplicationContext(), defaultSoundUri);
            ring.play();
        }

        if(statusv){
            ((Vibrator) getApplicationContext().getSystemService(
                    Context.VIBRATOR_SERVICE)).vibrate(800);
        }
    }

}


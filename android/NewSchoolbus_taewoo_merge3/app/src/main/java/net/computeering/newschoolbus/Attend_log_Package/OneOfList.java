package net.computeering.newschoolbus.Attend_log_Package;

/**
 * Created by kimtaewoo on 2016-07-15.
 */
public class OneOfList {
    public String text="";
    public String date="";

    public OneOfList(String text, String date){
        this.text = text;
        this.date = date;
    }
    public OneOfList(OneOfList list){
        this.text = list.text;
        this.date = list.date;
    }
}

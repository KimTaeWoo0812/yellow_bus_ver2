package net.computeering.newschoolbus.MapFragmentPackage;//package net.computeering.newschoolbus.TCP;

import android.app.ProgressDialog;
import android.content.Context;
import android.content.DialogInterface;
import android.os.Handler;
import android.util.Log;
import android.widget.Toast;

import net.computeering.newschoolbus.R;


public class Progress_forLogingGPS {

	private Handler mHandler;
	private Runnable mRunnable;
	private ProgressDialog m_loadingDialog = null;
	public boolean isCancle = false;

	static Context baseContext;

	public boolean flag_forServer = false;

//	public void DialogSimple(){
//		AlertDialog.Builder alt_bld = new AlertDialog.Builder(baseContext);
//		alt_bld.setMessage("다시 시도하시겠습니까?").setCancelable(
//				false).setPositiveButton("취소",
//				new DialogInterface.OnClickListener() {
//					public void onClick(DialogInterface dialog, int id) {
//						// do something
//						android.os.Process.killProcess(android.os.Process.myPid());// 완전종료
//						dialog.cancel();
//					}

	public void showLoading(final Context context) {
		baseContext = context;
		Log.i("###showLoading", "#1 ");
		if (m_loadingDialog == null) {

			Log.e("###", "con: " + context);
			m_loadingDialog = new ProgressDialog(context, R.style.AppTheme_Dark_Dialog);

			m_loadingDialog.setIndeterminate(true);
			m_loadingDialog.setMessage("GPS 인식 중...");
			m_loadingDialog.setButton(DialogInterface.BUTTON_NEGATIVE, "취소",
					new DialogInterface.OnClickListener() {
						public void onClick(DialogInterface dialog,
											int which) {
							Log.e("###", "con: " + isCancle);
							isCancle = true;
							Toast.makeText(context,
									"Cancle clicked",
									Toast.LENGTH_SHORT).show();
						}
					});


		}
		flag_forServer = true;
		m_loadingDialog.show();
		currentActivity(context);

	}

	public void hideLoading() {
		Log.i("###hideLoading", "#2 ");

		if (m_loadingDialog != null) {
			m_loadingDialog.dismiss();
			m_loadingDialog = null;
		}
	}

	public void currentActivity(final Context mContext) {
		mRunnable = new Runnable() {
			@Override
			public void run() {

				if (m_loadingDialog != null) {
					if (flag_forServer) {
						Toast toast = Toast.makeText(mContext,
								"인식 실패. 주변이 트인 곳에서 다시 시도해 주세요.", Toast.LENGTH_SHORT);
						toast.show();

						m_loadingDialog.dismiss();
						m_loadingDialog = null;
					}
				}
			}
		};

		mHandler = new Handler();
		mHandler.postDelayed(mRunnable, 10000);
	}

}
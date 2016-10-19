package layout;


import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.webkit.WebView;
import android.webkit.WebViewClient;

import net.computeering.newschoolbus.R;

/**
 * A simple {@link Fragment} subclass.
 */
public class WebFragment extends Fragment {

    WebView webView;

    public WebFragment() {
        // Required empty public constructor
    }


    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        View v = inflater.inflate( R.layout.fragment_web, container, false );
        webView = (WebView)v.findViewById(R.id.webView1);
        webView.setWebViewClient((new WebViewClient()));
        //webView.loadUrl("http://192.168.43.254/gnu/bbs/login_check_android.php?mb_id=windowsmail&mb_password=apmsetup");
        //webView.loadUrl("http://192.168.43.254/gnu/bbs/board.php?bo_table=board");
        webView.loadUrl("http://52.38.137.183/");

        //webView.loadUrl("http://192.168.43.254/gnu/bbs/login_check_android.php?mb_id=windowsmail&mb_password=apmsetup");
        webView.getSettings().setJavaScriptEnabled(true);
        webView.requestFocus();
        //webView.setWebViewClient(new Callback());

        return v;
    }

}

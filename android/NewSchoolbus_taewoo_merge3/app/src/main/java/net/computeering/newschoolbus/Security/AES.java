package net.computeering.newschoolbus.Security;

import android.util.Base64;

import java.security.InvalidAlgorithmParameterException;
import java.security.InvalidKeyException;
import java.security.NoSuchAlgorithmException;

import javax.crypto.BadPaddingException;
import javax.crypto.Cipher;
import javax.crypto.IllegalBlockSizeException;
import javax.crypto.NoSuchPaddingException;
import javax.crypto.spec.IvParameterSpec;
import javax.crypto.spec.SecretKeySpec;


public class AES {
	public final static byte[] key = { 0x00, 0x04, 0x02, 0x05, 0x00, 0x09, 0x02, 0x08,  0x00, 0x04, 0x02, 0x05, 0x00, 0x09, 0x02, 0x08 };

	public static String AES_Encode(String str)	throws java.io.UnsupportedEncodingException, NoSuchAlgorithmException, NoSuchPaddingException, InvalidKeyException, InvalidAlgorithmParameterException, IllegalBlockSizeException, BadPaddingException {
		byte[] textBytes = str.getBytes("UTF-8");
		IvParameterSpec ivSpec = new IvParameterSpec(key);
		SecretKeySpec newKey = new SecretKeySpec(key, "AES");
		Cipher cipher = null;
		cipher = Cipher.getInstance("AES/CBC/PKCS5Padding");
		cipher.init(Cipher.ENCRYPT_MODE, newKey, ivSpec);

		return Base64.encodeToString(cipher.doFinal(textBytes), 0);
	}

	public static String AES_Decode(String str)	throws java.io.UnsupportedEncodingException, NoSuchAlgorithmException, NoSuchPaddingException, InvalidKeyException, InvalidAlgorithmParameterException, IllegalBlockSizeException, BadPaddingException {

		byte[] textBytes =Base64.decode(str, 0);
		//byte[] textBytes = str.getBytes("UTF-8");
		IvParameterSpec ivSpec = new IvParameterSpec(key);
		SecretKeySpec newKey = new SecretKeySpec(key, "AES");
		Cipher cipher = Cipher.getInstance("AES/CBC/PKCS5Padding");
		cipher.init(Cipher.DECRYPT_MODE, newKey, ivSpec);
		return new String(cipher.doFinal(textBytes), "UTF-8");
	}

}

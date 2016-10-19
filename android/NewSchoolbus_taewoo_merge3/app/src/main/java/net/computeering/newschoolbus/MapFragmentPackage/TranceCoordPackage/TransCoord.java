package net.computeering.newschoolbus.MapFragmentPackage.TranceCoordPackage;

import android.support.v4.media.TransportMediator;


public class TransCoord {
    public static final double BASE_KTM_LAT = 38.0d;
    public static final double BASE_KTM_LON = 128.0d;
    public static final double BASE_TM_LAT = 38.0d;
    public static final double BASE_TM_LON = 127.0d;
    public static final double BASE_UTM_LAT = 0.0d;
    public static final double BASE_UTM_LON = 129.0d;
    private static final int[][] COORD_BASE;
    public static final int COORD_TYPE_BESSEL = 6;
    public static final int COORD_TYPE_CONGNAMUL = 4;
    public static final int COORD_TYPE_KTM = 2;
    public static final int COORD_TYPE_TM = 1;
    public static final int COORD_TYPE_UTM = 3;
    public static final int COORD_TYPE_WCONGNAMUL = 10;
    public static final int COORD_TYPE_WGS84 = 5;
    public static final int COORD_TYPE_WKTM = 8;
    public static final int COORD_TYPE_WTM = 7;

    static {
        int r0[][]= new int[11][];
        int[] iArr = new int[COORD_TYPE_KTM];
        iArr[0] = 129;
        r0[COORD_TYPE_UTM] = iArr;
        r0[COORD_TYPE_CONGNAMUL] = new int[]{-1, -1};
        r0[COORD_TYPE_WGS84] = new int[]{-1, -1};
        r0[COORD_TYPE_BESSEL] = new int[]{-1, -1};
        r0[COORD_TYPE_WTM] = new int[]{TransportMediator.KEYCODE_MEDIA_PAUSE, 38};
        r0[COORD_TYPE_WKTM] = new int[]{-1, -1};
        r0[9] = new int[COORD_TYPE_KTM];
        r0[COORD_TYPE_WCONGNAMUL] = new int[]{-1, -1};
        COORD_BASE = r0;
    }

    public static CoordPoint getTransCoord(CoordPoint inPoint, int fromType, int toType) {
        return convertCoord(inPoint, fromType, toType, (double) COORD_BASE[fromType][0], (double) COORD_BASE[fromType][COORD_TYPE_TM], (double) COORD_BASE[toType][0], (double) COORD_BASE[toType][COORD_TYPE_TM]);
    }

    private static CoordPoint convertCoord(CoordPoint point, int fromType, int toType, double frombx, double fromby, double tobx, double toby) {
        double bx = frombx;
        switch (fromType) {
            case COORD_TYPE_TM /*1*/:
                if (frombx <= BASE_UTM_LAT) {
                    bx = BASE_TM_LON;
                    fromby = BASE_TM_LAT;
                }
                return convertTM2(point, toType, bx, fromby, tobx, toby);
            case COORD_TYPE_KTM /*2*/:
                if (frombx <= BASE_UTM_LAT) {
                }
                return convertKTM2(point, toType, tobx, toby);
            case COORD_TYPE_UTM /*3*/:
                if (frombx <= BASE_UTM_LAT) {
                    bx = BASE_UTM_LON;
                    fromby = BASE_UTM_LAT;
                }
                return convertUTM2(point, toType, bx, fromby, tobx, toby);
            case COORD_TYPE_CONGNAMUL /*4*/:
                if (frombx <= BASE_UTM_LAT) {
                    bx = BASE_TM_LON;
                    fromby = BASE_TM_LAT;
                }
                return convertCONGNAMUL2(point, toType, bx, fromby, tobx, toby);
            case COORD_TYPE_WGS84 /*5*/:
                return convertWGS2(point, toType, bx, fromby, tobx, toby);
            case COORD_TYPE_BESSEL /*6*/:
                return convertBESSEL2(point, toType, bx, fromby, tobx, toby);
            case COORD_TYPE_WTM /*7*/:
                if (frombx <= BASE_UTM_LAT) {
                    bx = BASE_TM_LON;
                    fromby = BASE_TM_LAT;
                }
                return convertWTM2(point, toType, bx, fromby, tobx, toby);
            case COORD_TYPE_WKTM /*8*/:
                if (frombx <= BASE_UTM_LAT) {
                    bx = BASE_KTM_LON;
                }
                return convertWKTM2(point, toType, bx, frombx, tobx, toby);
            case COORD_TYPE_WCONGNAMUL /*10*/:
                if (frombx <= BASE_UTM_LAT) {
                    bx = BASE_TM_LON;
                    fromby = BASE_TM_LAT;
                }
                return convertWCONGNAMUL2(point, toType, bx, fromby, tobx, toby);
            default:
                return null;
        }
    }

    private static CoordPoint convertTM2(CoordPoint point, int toType, double frombx, double fromby, double tobx, double toby) {
        CoordPoint transPt = point.clone();
        switch (toType) {
            case COORD_TYPE_TM /*1*/:
                if (tobx <= BASE_UTM_LAT) {
                    tobx = BASE_TM_LON;
                    toby = BASE_TM_LAT;
                }
                transPt.convertTM2BESSEL(frombx, fromby);
                transPt.convertBESSEL2TM(tobx, toby);
                break;
            case COORD_TYPE_KTM /*2*/:
                transPt.convertTM2BESSEL(frombx, fromby);
                transPt.convertBESSEL2KTM();
                break;
            case COORD_TYPE_UTM /*3*/:
                if (tobx <= BASE_UTM_LAT) {
                    tobx = BASE_UTM_LON;
                    toby = BASE_UTM_LAT;
                }
                transPt.convertTM2BESSEL(frombx, fromby);
                transPt.convertBESSEL2WGS();
                transPt.convertWGS2UTM(tobx, toby);
                break;
            case COORD_TYPE_CONGNAMUL /*4*/:
                transPt.convertTM2BESSEL(frombx, fromby);
                transPt.convertBESSEL2CONG();
                break;
            case COORD_TYPE_WGS84 /*5*/:
                transPt.convertTM2BESSEL(frombx, fromby);
                transPt.convertBESSEL2WGS();
                break;
            case COORD_TYPE_BESSEL /*6*/:
                transPt.convertTM2BESSEL(frombx, fromby);
                break;
            case COORD_TYPE_WTM /*7*/:
                if (tobx <= BASE_UTM_LAT) {
                    tobx = BASE_TM_LON;
                    toby = BASE_TM_LAT;
                }
                transPt.convertTM2BESSEL(frombx, fromby);
                transPt.convertBESSEL2WGS();
                transPt.convertWGS2WTM(tobx, toby);
                break;
            case COORD_TYPE_WKTM /*8*/:
                transPt.convertTM2BESSEL(frombx, fromby);
                transPt.convertBESSEL2WGS();
                transPt.convertWGS2WKTM();
                break;
            case COORD_TYPE_WCONGNAMUL /*10*/:
                transPt.convertTM2BESSEL(frombx, fromby);
                transPt.convertBESSEL2WGS();
                transPt.convertWGS2WCONG();
                break;
        }
        return transPt;
    }

    private static CoordPoint convertKTM2(CoordPoint point, int toType, double tobx, double toby) {
        CoordPoint transPt = point.clone();
        switch (toType) {
            case COORD_TYPE_TM /*1*/:
                if (tobx <= BASE_UTM_LAT) {
                    tobx = BASE_TM_LON;
                    toby = BASE_TM_LAT;
                }
                transPt.convertKTM2BESSEL();
                transPt.convertBESSEL2TM(tobx, toby);
                break;
            case COORD_TYPE_UTM /*3*/:
                if (tobx <= BASE_UTM_LAT) {
                    tobx = BASE_UTM_LON;
                    toby = BASE_UTM_LAT;
                }
                transPt.convertKTM2BESSEL();
                transPt.convertBESSEL2WGS();
                transPt.convertWGS2UTM(tobx, toby);
                break;
            case COORD_TYPE_CONGNAMUL /*4*/:
                transPt.convertKTM2BESSEL();
                transPt.convertBESSEL2CONG();
                break;
            case COORD_TYPE_WGS84 /*5*/:
                transPt.convertKTM2BESSEL();
                transPt.convertBESSEL2WGS();
                break;
            case COORD_TYPE_BESSEL /*6*/:
                transPt.convertKTM2BESSEL();
                break;
            case COORD_TYPE_WTM /*7*/:
                if (tobx <= BASE_UTM_LAT) {
                    tobx = BASE_TM_LON;
                    toby = BASE_TM_LAT;
                }
                transPt.convertKTM2BESSEL();
                transPt.convertBESSEL2WGS();
                transPt.convertWGS2WTM(tobx, toby);
                break;
            case COORD_TYPE_WKTM /*8*/:
                transPt.convertKTM2BESSEL();
                transPt.convertBESSEL2WGS();
                transPt.convertWGS2WKTM();
                break;
            case COORD_TYPE_WCONGNAMUL /*10*/:
                transPt.convertKTM2BESSEL();
                transPt.convertBESSEL2WGS();
                transPt.convertWGS2WCONG();
                break;
        }
        return transPt;
    }

    private static CoordPoint convertUTM2(CoordPoint point, int d, double e, double h, double g, double j) {
        CoordPoint transPt = point.clone();
        switch (d) {
            case COORD_TYPE_TM /*1*/:
                if (g <= BASE_UTM_LAT) {
                    g = BASE_TM_LON;
                    j = BASE_TM_LAT;
                }
                transPt.convertUTM2WGS(e, h);
                transPt.convertWGS2BESSEL();
                transPt.convertBESSEL2TM(g, j);
                break;
            case COORD_TYPE_KTM /*2*/:
                transPt.convertUTM2WGS(e, h);
                transPt.convertWGS2BESSEL();
                transPt.convertBESSEL2KTM();
                break;
            case COORD_TYPE_UTM /*3*/:
                if (g <= BASE_UTM_LAT) {
                    g = BASE_UTM_LON;
                    j = BASE_UTM_LAT;
                }
                transPt.convertUTM2WGS(e, h);
                transPt.convertWGS2UTM(g, j);
                break;
            case COORD_TYPE_CONGNAMUL /*4*/:
                transPt.convertUTM2WGS(e, h);
                transPt.convertWGS2BESSEL();
                transPt.convertBESSEL2CONG();
                break;
            case COORD_TYPE_WGS84 /*5*/:
                transPt.convertUTM2WGS(e, h);
                break;
            case COORD_TYPE_BESSEL /*6*/:
                transPt.convertUTM2WGS(e, h);
                transPt.convertWGS2BESSEL();
                break;
            case COORD_TYPE_WTM /*7*/:
                if (g <= BASE_UTM_LAT) {
                    g = BASE_TM_LON;
                    j = BASE_TM_LAT;
                }
                transPt.convertUTM2WGS(e, h);
                transPt.convertWGS2WTM(g, j);
                break;
            case COORD_TYPE_WKTM /*8*/:
                transPt.convertUTM2WGS(e, h);
                transPt.convertWGS2WKTM();
                break;
            case COORD_TYPE_WCONGNAMUL /*10*/:
                transPt.convertUTM2WGS(e, h);
                transPt.convertWGS2WCONG();
                break;
        }
        return transPt;
    }

    private static CoordPoint convertCONGNAMUL2(CoordPoint point, int d, double e, double h, double g, double j) {
        CoordPoint transPt = point.clone();
        switch (d) {
            case COORD_TYPE_TM /*1*/:
                if (g <= BASE_UTM_LAT) {
                    g = BASE_TM_LON;
                    j = BASE_TM_LAT;
                }
                transPt.convertCONG2BESSEL();
                transPt.convertBESSEL2TM(g, j);
                break;
            case COORD_TYPE_KTM /*2*/:
                transPt.convertCONG2BESSEL();
                transPt.convertBESSEL2KTM();
                break;
            case COORD_TYPE_UTM /*3*/:
                if (g <= BASE_UTM_LAT) {
                    g = BASE_UTM_LON;
                    j = BASE_UTM_LAT;
                }
                transPt.convertCONG2BESSEL();
                transPt.convertBESSEL2WGS();
                transPt.convertWGS2UTM(g, j);
                break;
            case COORD_TYPE_WGS84 /*5*/:
                transPt.convertCONG2BESSEL();
                transPt.convertBESSEL2WGS();
                break;
            case COORD_TYPE_BESSEL /*6*/:
                transPt.convertCONG2BESSEL();
                break;
            case COORD_TYPE_WTM /*7*/:
                if (g <= BASE_UTM_LAT) {
                    g = BASE_TM_LON;
                    j = BASE_TM_LAT;
                }
                transPt.convertCONG2BESSEL();
                transPt.convertBESSEL2WGS();
                transPt.convertWGS2WTM(g, j);
                break;
            case COORD_TYPE_WKTM /*8*/:
                transPt.convertCONG2BESSEL();
                transPt.convertBESSEL2WGS();
                transPt.convertWGS2WKTM();
                break;
            case COORD_TYPE_WCONGNAMUL /*10*/:
                transPt.convertCONG2BESSEL();
                transPt.convertBESSEL2WGS();
                transPt.convertWGS2WCONG();
                break;
        }
        return transPt;
    }

    private static CoordPoint convertWGS2(CoordPoint point, int d, double e, double h, double g, double j) {
        CoordPoint transPt = point.clone();
        switch (d) {
            case COORD_TYPE_TM /*1*/:
                if (g <= BASE_UTM_LAT) {
                    g = BASE_TM_LON;
                    j = BASE_TM_LAT;
                }
                transPt.convertWGS2BESSEL();
                transPt.convertBESSEL2TM(g, j);
                break;
            case COORD_TYPE_KTM /*2*/:
                transPt.convertWGS2BESSEL();
                transPt.convertBESSEL2KTM();
                break;
            case COORD_TYPE_UTM /*3*/:
                if (g <= BASE_UTM_LAT) {
                    g = BASE_UTM_LON;
                    j = BASE_UTM_LAT;
                }
                transPt.convertWGS2UTM(g, j);
                break;
            case COORD_TYPE_CONGNAMUL /*4*/:
                transPt.convertWGS2BESSEL();
                transPt.convertBESSEL2CONG();
                break;
            case COORD_TYPE_BESSEL /*6*/:
                transPt.convertWGS2BESSEL();
                break;
            case COORD_TYPE_WTM /*7*/:
                if (g <= BASE_UTM_LAT) {
                    g = BASE_TM_LON;
                    j = BASE_TM_LAT;
                }
                transPt.convertWGS2WTM(g, j);
                break;
            case COORD_TYPE_WKTM /*8*/:
                transPt.convertWGS2WKTM();
                break;
            case COORD_TYPE_WCONGNAMUL /*10*/:
                transPt.convertWGS2WCONG();
                break;
        }
        return transPt;
    }

    private static CoordPoint convertBESSEL2(CoordPoint point, int d, double e, double h, double g, double j) {
        CoordPoint transPt = point.clone();
        switch (d) {
            case COORD_TYPE_TM /*1*/:
                if (g <= BASE_UTM_LAT) {
                    g = BASE_TM_LON;
                    j = BASE_TM_LAT;
                }
                transPt.convertBESSEL2TM(g, j);
                break;
            case COORD_TYPE_KTM /*2*/:
                transPt.convertBESSEL2KTM();
                break;
            case COORD_TYPE_UTM /*3*/:
                if (g <= BASE_UTM_LAT) {
                    g = BASE_UTM_LON;
                    j = BASE_UTM_LAT;
                }
                transPt.convertBESSEL2WGS();
                transPt.convertWGS2UTM(g, j);
                break;
            case COORD_TYPE_CONGNAMUL /*4*/:
                transPt.convertBESSEL2CONG();
                break;
            case COORD_TYPE_WGS84 /*5*/:
                transPt.convertBESSEL2WGS();
                break;
            case COORD_TYPE_WTM /*7*/:
                if (g <= BASE_UTM_LAT) {
                    g = BASE_TM_LON;
                    j = BASE_TM_LAT;
                }
                transPt.convertBESSEL2WGS();
                transPt.convertWGS2WTM(g, j);
                break;
            case COORD_TYPE_WKTM /*8*/:
                transPt.convertBESSEL2WGS();
                transPt.convertWGS2WKTM();
                break;
            case COORD_TYPE_WCONGNAMUL /*10*/:
                transPt.convertBESSEL2WGS();
                transPt.convertWGS2WCONG();
                break;
        }
        return transPt;
    }

    private static CoordPoint convertWTM2(CoordPoint point, int d, double e, double h, double g, double j) {
        CoordPoint transPt = point.clone();
        switch (d) {
            case COORD_TYPE_TM /*1*/:
                if (g <= BASE_UTM_LAT) {
                    g = BASE_TM_LON;
                    j = BASE_TM_LAT;
                }
                transPt.convertWTM2WGS(e, h);
                transPt.convertWGS2BESSEL();
                transPt.convertBESSEL2TM(g, j);
                break;
            case COORD_TYPE_KTM /*2*/:
                transPt.convertWTM2WGS(e, h);
                transPt.convertWGS2BESSEL();
                transPt.convertBESSEL2KTM();
                break;
            case COORD_TYPE_UTM /*3*/:
                if (g <= BASE_UTM_LAT) {
                    g = BASE_UTM_LON;
                    j = BASE_UTM_LAT;
                }
                transPt.convertWTM2WGS(e, h);
                transPt.convertWGS2UTM(g, j);
                break;
            case COORD_TYPE_CONGNAMUL /*4*/:
                transPt.convertWTM2WGS(e, h);
                transPt.convertWGS2BESSEL();
                transPt.convertBESSEL2CONG();
                break;
            case COORD_TYPE_WGS84 /*5*/:
                transPt.convertWTM2WGS(e, h);
                transPt.convertWGS2BESSEL();
                transPt.convertBESSEL2WGS();
                break;
            case COORD_TYPE_BESSEL /*6*/:
                transPt.convertWTM2WGS(e, h);
                transPt.convertWGS2BESSEL();
                break;
            case COORD_TYPE_WTM /*7*/:
                if (g <= BASE_UTM_LAT) {
                    g = BASE_TM_LON;
                    j = BASE_TM_LAT;
                }
                transPt.convertWTM2WGS(e, h);
                transPt.convertWGS2WTM(g, j);
                break;
            case COORD_TYPE_WKTM /*8*/:
                transPt.convertWTM2WGS(e, h);
                transPt.convertWGS2WKTM();
                break;
            case COORD_TYPE_WCONGNAMUL /*10*/:
                transPt.convertWTM2WGS(e, h);
                transPt.convertWGS2WCONG();
                break;
        }
        return transPt;
    }

    private static CoordPoint convertWKTM2(CoordPoint point, int d, double e, double h, double g, double j) {
        CoordPoint transPt = point.clone();
        switch (d) {
            case COORD_TYPE_TM /*1*/:
                if (g <= BASE_UTM_LAT) {
                    g = BASE_TM_LON;
                    j = BASE_TM_LAT;
                }
                transPt.convertWKTM2WGS();
                transPt.convertWGS2BESSEL();
                transPt.convertBESSEL2TM(g, j);
                break;
            case COORD_TYPE_UTM /*3*/:
                if (g <= BASE_UTM_LAT) {
                    g = BASE_UTM_LON;
                    j = BASE_UTM_LAT;
                }
                transPt.convertWKTM2WGS();
                transPt.convertWGS2UTM(g, j);
                break;
            case COORD_TYPE_CONGNAMUL /*4*/:
                transPt.convertWKTM2WGS();
                transPt.convertWGS2BESSEL();
                transPt.convertBESSEL2CONG();
                break;
            case COORD_TYPE_WGS84 /*5*/:
                transPt.convertWKTM2WGS();
                transPt.convertWGS2BESSEL();
                transPt.convertBESSEL2WGS();
                break;
            case COORD_TYPE_BESSEL /*6*/:
                transPt.convertWKTM2WGS();
                transPt.convertWGS2BESSEL();
                break;
            case COORD_TYPE_WTM /*7*/:
                if (g <= BASE_UTM_LAT) {
                    g = BASE_TM_LON;
                    j = BASE_TM_LAT;
                }
                transPt.convertWKTM2WGS();
                transPt.convertWGS2WTM(g, j);
                break;
            case COORD_TYPE_WKTM /*8*/:
                transPt.convertWKTM2WGS();
                transPt.convertWGS2WKTM();
                break;
            case COORD_TYPE_WCONGNAMUL /*10*/:
                transPt.convertWKTM2WGS();
                transPt.convertWGS2WCONG();
                break;
        }
        return transPt;
    }

    private static CoordPoint convertWCONGNAMUL2(CoordPoint point, int d, double e, double h, double g, double j) {
        CoordPoint transPt = point.clone();
        switch (d) {
            case COORD_TYPE_TM /*1*/:
                if (g <= BASE_UTM_LAT) {
                    g = BASE_TM_LON;
                    j = BASE_TM_LAT;
                }
                transPt.convertWCONG2WGS();
                transPt.convertWGS2BESSEL();
                transPt.convertBESSEL2TM(g, j);
                break;
            case COORD_TYPE_KTM /*2*/:
                transPt.convertWCONG2WGS();
                transPt.convertWGS2BESSEL();
                transPt.convertBESSEL2KTM();
                break;
            case COORD_TYPE_UTM /*3*/:
                if (g <= BASE_UTM_LAT) {
                    g = BASE_UTM_LON;
                    j = BASE_UTM_LAT;
                }
                transPt.convertWCONG2WGS();
                transPt.convertWGS2UTM(g, j);
                break;
            case COORD_TYPE_CONGNAMUL /*4*/:
                transPt.convertWCONG2WGS();
                transPt.convertWGS2BESSEL();
                transPt.convertBESSEL2CONG();
                break;
            case COORD_TYPE_WGS84 /*5*/:
                transPt.convertWCONG2WGS();
                transPt.convertWGS2BESSEL();
                transPt.convertBESSEL2WGS();
                break;
            case COORD_TYPE_BESSEL /*6*/:
                transPt.convertWCONG2WGS();
                transPt.convertWGS2BESSEL();
                break;
            case COORD_TYPE_WTM /*7*/:
                if (g <= BASE_UTM_LAT) {
                    g = BASE_TM_LON;
                    j = BASE_TM_LAT;
                }
                transPt.convertWCONG2WGS();
                transPt.convertWGS2WTM(g, j);
                break;
            case COORD_TYPE_WKTM /*8*/:
                transPt.convertWCONG2WGS();
                transPt.convertWGS2WKTM();
                break;
        }
        return transPt;
    }
}

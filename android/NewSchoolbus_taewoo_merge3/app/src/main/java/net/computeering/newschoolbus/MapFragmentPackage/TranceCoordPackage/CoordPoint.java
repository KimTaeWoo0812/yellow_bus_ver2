package net.computeering.newschoolbus.MapFragmentPackage.TranceCoordPackage;


public class CoordPoint {
    private static final double m_AB = 6377397.155d;
    private static final double m_AW = 6378137.0d;
    private static final double m_FB = 0.0033427731799399794d;
    private static final double m_FW = 0.0033528106647474805d;
    private static final double m_OKGTM = 0.9999d;
    private static final double m_OKKTM = 1.0d;
    private static final double m_OKUTM = 0.9996d;
    private static final double m_TKAPPA = -1.63d;
    private static final double m_TMODE = 1.0d;
    private static final double m_TOMEGA = 1.16d;
    private static final double m_TPHI = -2.31d;
    private static final double m_TS = -6.43d;
    private static final double m_TX = 115.8d;
    private static final double m_TY = -474.99d;
    private static final double m_TZ = -674.11d;
    private static final double m_ux0 = 0.0d;
    private static final double m_uy0 = 500000.0d;
    private static final double m_x0 = 500000.0d;
    private static final double m_x1 = 600000.0d;
    private static final double m_y0 = 200000.0d;
    private static final double m_y1 = 400000.0d;
    private double[][] deltaValue1;
    private double[][] deltaValue2;
    private double m_ds;
    private double m_dx;
    private double m_dy;
    private double m_dz;
    private double m_imode;
    private double m_kappa;
    private double m_omega;
    private double m_phi;
    private final CoordRect[] rectArray1;
    private final CoordRect[] rectArray2;
    public double f8x;
    public double f9y;

    private class CoordRect {
        public double f4h;
        public double f5w;
        public double f6x;
        public double f7y;

        public CoordRect(double x, double y, double w, double h) {
            this.f6x = x;
            this.f7y = y;
            this.f5w = w;
            this.f4h = h;
        }
    }

    public CoordPoint() {
        this.m_imode = m_ux0;
        this.m_ds = m_ux0;
        this.m_kappa = m_ux0;
        this.m_phi = m_ux0;
        this.m_omega = m_ux0;
        this.m_dz = m_ux0;
        this.m_dy = m_ux0;
        this.m_dx = m_ux0;
        this.rectArray1 = new CoordRect[]{new CoordRect(112500.0d, -50000.0d, 33500.0d, 53000.0d), new CoordRect(146000.0d, -50000.0d, 54000.0d, 58600.0d), new CoordRect(130000.0d, 44000.0d, 15000.0d, 14000.0d), new CoordRect(532500.0d, 437500.0d, 25000.0d, 25000.0d), new CoordRect(625000.0d, 412500.0d, 25000.0d, 25000.0d), new CoordRect(-12500.0d, 462500.0d, 17500.0d, 50000.0d)};
        this.rectArray2 = new CoordRect[]{new CoordRect(112500.0d, -50000.0d, 33500.0d, 53000.0d), new CoordRect(146000.0d, -50000.0d, 54000.0d, 58600.0d), new CoordRect(130000.0d, 44000.0d, 15000.0d, 14000.0d), new CoordRect(532500.0d, 437500.0d, 25000.0d, 25000.0d), new CoordRect(625000.0d, 412500.0d, 25000.0d, 25000.0d), new CoordRect(-12500.0d, 462500.0d, 17500.0d, 50000.0d)};
        this.deltaValue1 = new double[][]{new double[]{m_ux0, 50000.0d}, new double[]{m_ux0, 50000.0d}, new double[]{m_ux0, 10000.0d}, new double[]{-70378.0d, -136.0d}, new double[]{-144738.0d, -2161.0d}, new double[]{23510.0d, -111.0d}};
        this.deltaValue2 = new double[][]{new double[]{m_ux0, -50000.0d}, new double[]{m_ux0, -50000.0d}, new double[]{m_ux0, -10000.0d}, new double[]{70378.0d, 136.0d}, new double[]{144738.0d, 2161.0d}, new double[]{-23510.0d, 111.0d}};
        for (int i = 0; i < this.rectArray2.length; i++) {
            CoordRect coordRect = this.rectArray2[i];
            coordRect.f6x += this.deltaValue1[i][0];
            coordRect = this.rectArray2[i];
            coordRect.f7y += this.deltaValue1[i][1];
        }
    }

    public CoordPoint(double x, double y) {
        this.m_imode = m_ux0;
        this.m_ds = m_ux0;
        this.m_kappa = m_ux0;
        this.m_phi = m_ux0;
        this.m_omega = m_ux0;
        this.m_dz = m_ux0;
        this.m_dy = m_ux0;
        this.m_dx = m_ux0;
        this.rectArray1 = new CoordRect[]{new CoordRect(112500.0d, -50000.0d, 33500.0d, 53000.0d), new CoordRect(146000.0d, -50000.0d, 54000.0d, 58600.0d), new CoordRect(130000.0d, 44000.0d, 15000.0d, 14000.0d), new CoordRect(532500.0d, 437500.0d, 25000.0d, 25000.0d), new CoordRect(625000.0d, 412500.0d, 25000.0d, 25000.0d), new CoordRect(-12500.0d, 462500.0d, 17500.0d, 50000.0d)};
        this.rectArray2 = new CoordRect[]{new CoordRect(112500.0d, -50000.0d, 33500.0d, 53000.0d), new CoordRect(146000.0d, -50000.0d, 54000.0d, 58600.0d), new CoordRect(130000.0d, 44000.0d, 15000.0d, 14000.0d), new CoordRect(532500.0d, 437500.0d, 25000.0d, 25000.0d), new CoordRect(625000.0d, 412500.0d, 25000.0d, 25000.0d), new CoordRect(-12500.0d, 462500.0d, 17500.0d, 50000.0d)};
        this.deltaValue1 = new double[][]{new double[]{m_ux0, 50000.0d}, new double[]{m_ux0, 50000.0d}, new double[]{m_ux0, 10000.0d}, new double[]{-70378.0d, -136.0d}, new double[]{-144738.0d, -2161.0d}, new double[]{23510.0d, -111.0d}};
        this.deltaValue2 = new double[][]{new double[]{m_ux0, -50000.0d}, new double[]{m_ux0, -50000.0d}, new double[]{m_ux0, -10000.0d}, new double[]{70378.0d, 136.0d}, new double[]{144738.0d, 2161.0d}, new double[]{-23510.0d, 111.0d}};
        this.f8x = x;
        this.f9y = y;
    }

    public CoordPoint clone() {
        return new CoordPoint(this.f8x, this.f9y);
    }

    public void convertBESSEL2KTM() {
        GP2TM(m_AB, m_FB, m_x1, m_y1, m_OKGTM, TransCoord.BASE_TM_LAT, TransCoord.BASE_KTM_LON);
    }

    public void convertBESSEL2CONG() {
        GP2TM(m_AB, m_FB, m_x0, m_y0, m_TMODE, TransCoord.BASE_TM_LAT, 127.00289027777778d);
        shiftIsland(true);
    }

    public void convertBESSEL2WGS() {
        setParameter(m_TX, m_TY, m_TZ, m_TOMEGA, m_TPHI, m_TKAPPA, m_TS, m_TMODE);
        double[] rtn = GP2WGP(this.f9y, this.f8x, m_ux0, m_AB, m_FB);
        this.f8x = rtn[1];
        this.f9y = rtn[0];
    }

    public void convertKTM2BESSEL() {
        TM2GP(m_AB, m_FB, m_x1, m_y1, m_OKGTM, TransCoord.BASE_TM_LAT, TransCoord.BASE_KTM_LON);
    }

    public void convertBESSEL2TM(double d, double e) {
        GP2TM(m_AB, m_FB, m_x0, m_y0, m_TMODE, e, d + 0.0028902777777777776d);
    }

    public void convertTM2BESSEL(double d, double e) {
        TM2GP(m_AB, m_FB, m_x0, m_y0, m_TMODE, e, d + 0.0028902777777777776d);
    }

    public void convertWGS2UTM(double d, double e) {
        setParameter(m_TX, m_TY, m_TZ, m_TOMEGA, m_TPHI, m_TKAPPA, m_TS, m_TMODE);
        GP2TM(m_AW, m_FW, m_ux0, m_x0, m_OKUTM, e, d);
    }

    public void convertWGS2WTM(double d, double e) {
        GP2TM(m_AW, m_FW, m_x0, m_y0, m_TMODE, e, d);
    }

    public void convertWGS2WKTM() {
        GP2TM(m_AW, m_FW, m_x1, m_y1, m_OKGTM, TransCoord.BASE_TM_LAT, TransCoord.BASE_KTM_LON);
    }

    public void convertWGS2WCONG() {
        GP2TM(m_AW, m_FW, m_x0, m_y0, m_TMODE, TransCoord.BASE_TM_LAT, TransCoord.BASE_TM_LON);
        this.f8x = (double) Math.round(this.f8x * 2.5d);
        this.f9y = (double) Math.round(this.f9y * 2.5d);
    }

    public void convertUTM2WGS(double d, double e) {
        setParameter(m_TX, m_TY, m_TZ, m_TOMEGA, m_TPHI, m_TKAPPA, m_TS, m_TMODE);
        TM2GP(m_AW, m_FW, m_ux0, m_x0, m_OKUTM, e, d);
    }

    public void convertWGS2BESSEL() {
        setParameter(m_TX, m_TY, m_TZ, m_TOMEGA, m_TPHI, m_TKAPPA, m_TS, m_TMODE);
        double[] rtn = WGP2GP(this.f9y, this.f8x, m_ux0, m_AB, m_FB);
        this.f8x = rtn[1];
        this.f9y = rtn[0];
    }

    public void convertCONG2BESSEL() {
        shiftIsland(false);
        TM2GP(m_AB, m_FB, m_x0, m_y0, m_TMODE, TransCoord.BASE_TM_LAT, 127.00289027777778d);
    }

    public void convertWTM2WGS(double d, double e) {
        TM2GP(m_AW, m_FW, m_x0, m_y0, m_TMODE, e, d);
    }

    public void convertWKTM2WGS() {
        TM2GP(m_AW, m_FW, m_x1, m_y1, m_OKGTM, TransCoord.BASE_TM_LAT, TransCoord.BASE_KTM_LON);
    }

    public void convertWCONG2WGS() {
        this.f8x /= 2.5d;
        this.f9y /= 2.5d;
        TM2GP(m_AW, m_FW, m_x0, m_y0, m_TMODE, TransCoord.BASE_TM_LAT, TransCoord.BASE_TM_LON);
    }

    private double[] WGP2GP(double a, double b, double d, double e, double h) {
        double[] rtn = WGP2WCTR(a, b, d);
        if (this.m_imode == m_TMODE) {
            rtn = TransMolod(rtn[0], rtn[1], rtn[2]);
        } else {
            rtn = TransBursa(rtn[0], rtn[1], rtn[2]);
        }
        return CTR2GP(rtn[0], rtn[1], rtn[2], e, h);
    }

    private double[] WGP2WCTR(double a, double b, double d) {
        return GP2CTR(a, b, d, m_AW, m_FW);
    }

    private double[] GP2WGP(double a, double b, double d, double e, double h) {
        double[] rtn = GP2CTR(a, b, d, e, h);
        if (this.m_imode == m_TMODE) {
            rtn = InverseMolod(rtn[0], rtn[1], rtn[2]);
        } else {
            rtn = InverseBursa(rtn[0], rtn[1], rtn[2]);
        }
        return WCTR2WGP(rtn[0], rtn[1], rtn[2]);
    }

    private double[] GP2CTR(double a, double b, double d, double e, double h) {
        double[] rtn = new double[3];
        double m = h;
        if (m > m_TMODE) {
            m = m_TMODE / m;
        }
        double j = Math.atan(m_TMODE) / 45.0d;
        double l = a * j;
        j *= b;
        m = m_TMODE / m;
        m = ((m - m_TMODE) * e) / m;
        double o = e / Math.sqrt(m_TMODE - (Math.pow(Math.sin(l), 2.0d) * ((Math.pow(e, 2.0d) - Math.pow(m, 2.0d)) / Math.pow(e, 2.0d))));
        rtn[0] = ((o + d) * Math.cos(l)) * Math.cos(j);
        rtn[1] = ((o + d) * Math.cos(l)) * Math.sin(j);
        rtn[2] = (((Math.pow(m, 2.0d) / Math.pow(e, 2.0d)) * o) + d) * Math.sin(l);
        return rtn;
    }

    private double[] InverseMolod(double a, double b, double d) {
        double[] rtn = new double[3];
        double e = (a - this.m_dx) * (m_TMODE + this.m_ds);
        double h = (b - this.m_dy) * (m_TMODE + this.m_ds);
        double g = (d - this.m_dz) * (m_TMODE + this.m_ds);
        rtn[0] = (m_TMODE / (m_TMODE + this.m_ds)) * ((e - (this.m_kappa * h)) + (this.m_phi * g));
        rtn[1] = (m_TMODE / (m_TMODE + this.m_ds)) * (((this.m_kappa * e) + h) - (this.m_omega * g));
        rtn[2] = (m_TMODE / (m_TMODE + this.m_ds)) * ((((-1.0d * this.m_phi) * e) + (this.m_omega * h)) + g);
        return rtn;
    }

    private double[] InverseBursa(double a, double b, double d) {
        double e = a - this.m_dx;
        double h = b - this.m_dy;
        double g = d - this.m_dz;
        return new double[]{(m_TMODE / (m_TMODE + this.m_ds)) * ((e - (this.m_kappa * h)) + (this.m_phi * g)), (m_TMODE / (m_TMODE + this.m_ds)) * (((this.m_kappa * e) + h) - (this.m_omega * g)), (m_TMODE / (m_TMODE + this.m_ds)) * ((((-1.0d * this.m_phi) * e) + (this.m_omega * h)) + g)};
    }

    private double[] TransMolod(double a, double b, double d) {
        return new double[]{(((m_TMODE + this.m_ds) * ((this.m_kappa * b) - (this.m_phi * d))) + a) + this.m_dx, (((m_TMODE + this.m_ds) * (((-1.0d * this.m_kappa) * a) + (this.m_omega * d))) + b) + this.m_dy, (((m_TMODE + this.m_ds) * ((this.m_phi * a) - (this.m_omega * b))) + d) + this.m_dz};
    }

    private double[] TransBursa(double a, double b, double d) {
        return new double[]{((m_TMODE + this.m_ds) * (((this.m_kappa * b) + a) - (this.m_phi * d))) + this.m_dx, ((m_TMODE + this.m_ds) * ((((-1.0d * this.m_kappa) * a) + b) + (this.m_omega * d))) + this.m_dy, ((m_TMODE + this.m_ds) * (((this.m_phi * a) - (this.m_omega * b)) + d)) + this.m_dz};
    }

    private double[] WCTR2WGP(double a, double b, double d) {
        return CTR2GP(a, b, d, m_AW, m_FW);
    }

    private double[] CTR2GP(double a, double b, double d, double e, double h) {
        double l;
        double m = h;
        double w = m_ux0;
        double j = m_ux0;
        if (m > m_TMODE) {
            m = m_TMODE / m;
        }
        double g = Math.atan(m_TMODE) / 45.0d;
        m = m_TMODE / m;
        double o = ((m - m_TMODE) * e) / m;
        double D = (Math.pow(e, 2.0d) - Math.pow(o, 2.0d)) / Math.pow(e, 2.0d);
        m = Math.atan(b / a);
        double A = Math.sqrt((a * a) + (b * b));
        double u = e;
        b = m_ux0;
        do {
            b += m_TMODE;
            l = Math.atan(d / Math.sqrt(Math.pow(((Math.pow(o, 2.0d) / Math.pow(e, 2.0d)) * u) + w, 2.0d) - Math.pow(d, 2.0d)));
            if (Math.abs(l - j) < 1.0E-18d) {
                break;
            }
            u = e / Math.sqrt(m_TMODE - (Math.pow(Math.sin(l), 2.0d) * D));
            w = (A / Math.cos(l)) - u;
            j = l;
        } while (b <= 30.0d);
        double[] rtn = new double[]{l / g, m / g};
        if (a < m_ux0) {
            rtn[1] = 180.0d + rtn[1];
        }
        if (rtn[1] < m_ux0) {
            rtn[1] = 360.0d + rtn[1];
        }
        return rtn;
    }

    private void GP2TM(double d, double e, double h, double g, double j, double l, double m) {
        double a = this.f9y;
        double b = this.f8x;
        double w = e;
        double B = g;
        if (w > m_TMODE) {
            w = m_TMODE / w;
        }
        double A = Math.atan(m_TMODE) / 45.0d;
        double o = a * A;
        double u = l * A;
        w = m_TMODE / w;
        double z = ((w - m_TMODE) * d) / w;
        double G = (Math.pow(d, 2.0d) - Math.pow(z, 2.0d)) / Math.pow(d, 2.0d);
        w = (Math.pow(d, 2.0d) - Math.pow(z, 2.0d)) / Math.pow(z, 2.0d);
        z = (d - z) / (d + z);
        double E = d * (((m_TMODE - z) + ((5.0d * (Math.pow(z, 2.0d) - Math.pow(z, 3.0d))) / 4.0d)) + ((81.0d * (Math.pow(z, 4.0d) - Math.pow(z, 5.0d))) / 64.0d));
        double I = ((3.0d * d) * (((z - Math.pow(z, 2.0d)) + ((7.0d * (Math.pow(z, 3.0d) - Math.pow(z, 4.0d))) / 8.0d)) + ((55.0d * Math.pow(z, 5.0d)) / 64.0d))) / 2.0d;
        double J = ((15.0d * d) * ((Math.pow(z, 2.0d) - Math.pow(z, 3.0d)) + ((3.0d * (Math.pow(z, 4.0d) - Math.pow(z, 5.0d))) / 4.0d))) / 16.0d;
        double L = ((35.0d * d) * ((Math.pow(z, 3.0d) - Math.pow(z, 4.0d)) + ((11.0d * Math.pow(z, 5.0d)) / 16.0d))) / 48.0d;
        double M = ((315.0d * d) * (Math.pow(z, 4.0d) - Math.pow(z, 5.0d))) / 512.0d;
        double D = (b * A) - (A * m);
        z = (((((E * u) - (Math.sin(2.0d * u) * I)) + (Math.sin(4.0d * u) * J)) - (Math.sin(6.0d * u) * L)) + (Math.sin(8.0d * u) * M)) * j;
        double H = Math.sin(o);
        u = Math.cos(o);
        A = H / u;
        w *= Math.pow(u, 2.0d);
        G = d / Math.sqrt(m_TMODE - (Math.pow(Math.sin(o), 2.0d) * G));
        this.f9y = ((((((Math.pow(D, 2.0d) * ((((G * H) * u) * j) / 2.0d)) + ((((((E * o) - (Math.sin(2.0d * o) * I)) + (Math.sin(4.0d * o) * J)) - (Math.sin(6.0d * o) * L)) + (Math.sin(8.0d * o) * M)) * j)) + (Math.pow(D, 4.0d) * (((((G * H) * Math.pow(u, 3.0d)) * j) * (((5.0d - Math.pow(A, 2.0d)) + (9.0d * w)) + (4.0d * Math.pow(w, 2.0d)))) / 24.0d))) + (Math.pow(D, 6.0d) * (((((G * H) * Math.pow(u, 5.0d)) * j) * ((((((((((61.0d - (58.0d * Math.pow(A, 2.0d))) + Math.pow(A, 4.0d)) + (270.0d * w)) - ((330.0d * Math.pow(A, 2.0d)) * w)) + (445.0d * Math.pow(w, 2.0d))) + (324.0d * Math.pow(w, 3.0d))) - ((680.0d * Math.pow(A, 2.0d)) * Math.pow(w, 2.0d))) + (88.0d * Math.pow(w, 4.0d))) - ((600.0d * Math.pow(A, 2.0d)) * Math.pow(w, 3.0d))) - ((192.0d * Math.pow(A, 2.0d)) * Math.pow(w, 4.0d)))) / 720.0d))) + (Math.pow(D, 8.0d) * (((((G * H) * Math.pow(u, 7.0d)) * j) * (((1385.0d - (3111.0d * Math.pow(A, 2.0d))) + (543.0d * Math.pow(A, 4.0d))) - Math.pow(A, 6.0d))) / 40320.0d))) - z) + h;
        this.f8x = ((((D * ((G * u) * j)) + B) + (Math.pow(D, 3.0d) * ((((Math.pow(u, 3.0d) * G) * j) * ((m_TMODE - Math.pow(A, 2.0d)) + w)) / 6.0d))) + (Math.pow(D, 5.0d) * ((((Math.pow(u, 5.0d) * G) * j) * ((((((((5.0d - (18.0d * Math.pow(A, 2.0d))) + Math.pow(A, 4.0d)) + (14.0d * w)) - ((58.0d * Math.pow(A, 2.0d)) * w)) + (13.0d * Math.pow(w, 2.0d))) + (4.0d * Math.pow(w, 3.0d))) - ((64.0d * Math.pow(A, 2.0d)) * Math.pow(w, 2.0d))) - ((25.0d * Math.pow(A, 2.0d)) * Math.pow(w, 3.0d)))) / 120.0d))) + (Math.pow(D, 7.0d) * ((((Math.pow(u, 7.0d) * G) * j) * (((61.0d - (479.0d * Math.pow(A, 2.0d))) + (179.0d * Math.pow(A, 4.0d))) - Math.pow(A, 6.0d))) / 5040.0d));
    }

    private void TM2GP(double d, double e, double h, double g, double j, double l, double m) {
        double H;
        double u = e;
        double a = this.f9y;
        double b = this.f8x;
        if (u > m_TMODE) {
            u = m_TMODE / u;
        }
        double A = g;
        double w = Math.atan(m_TMODE) / 45.0d;
        double o = l * w;
        double D = m * w;
        u = m_TMODE / u;
        double B = ((u - m_TMODE) * d) / u;
        double z = (Math.pow(d, 2.0d) - Math.pow(B, 2.0d)) / Math.pow(d, 2.0d);
        u = (Math.pow(d, 2.0d) - Math.pow(B, 2.0d)) / Math.pow(B, 2.0d);
        B = (d - B) / (d + B);
        double G = d * (((m_TMODE - B) + ((5.0d * (Math.pow(B, 2.0d) - Math.pow(B, 3.0d))) / 4.0d)) + ((81.0d * (Math.pow(B, 4.0d) - Math.pow(B, 5.0d))) / 64.0d));
        double E = ((3.0d * d) * (((B - Math.pow(B, 2.0d)) + ((7.0d * (Math.pow(B, 3.0d) - Math.pow(B, 4.0d))) / 8.0d)) + ((55.0d * Math.pow(B, 5.0d)) / 64.0d))) / 2.0d;
        double I = ((15.0d * d) * ((Math.pow(B, 2.0d) - Math.pow(B, 3.0d)) + ((3.0d * (Math.pow(B, 4.0d) - Math.pow(B, 5.0d))) / 4.0d))) / 16.0d;
        double J = ((35.0d * d) * ((Math.pow(B, 3.0d) - Math.pow(B, 4.0d)) + ((11.0d * Math.pow(B, 5.0d)) / 16.0d))) / 48.0d;
        double L = ((315.0d * d) * (Math.pow(B, 4.0d) - Math.pow(B, 5.0d))) / 512.0d;
        double M = ((a + ((((((G * o) - (Math.sin(2.0d * o) * E)) + (Math.sin(4.0d * o) * I)) - (Math.sin(6.0d * o) * J)) + (Math.sin(8.0d * o) * L)) * j)) - h) / j;
        o = M / (((m_TMODE - z) * d) / Math.pow(Math.sqrt(m_TMODE - (Math.pow(Math.sin(m_ux0), 2.0d) * z)), 3.0d));
        for (a = m_TMODE; a <= 5.0d; a += m_TMODE) {
            H = ((m_TMODE - z) * d) / Math.pow(Math.sqrt(m_TMODE - (Math.pow(Math.sin(o), 2.0d) * z)), 3.0d);
            o += (M - (((((G * o) - (Math.sin(2.0d * o) * E)) + (Math.sin(4.0d * o) * I)) - (Math.sin(6.0d * o) * J)) + (Math.sin(8.0d * o) * L))) / H;
        }
        H = ((m_TMODE - z) * d) / Math.pow(Math.sqrt(m_TMODE - (Math.pow(Math.sin(o), 2.0d) * z)), 3.0d);
        G = d / Math.sqrt(m_TMODE - (Math.pow(Math.sin(o), 2.0d) * z));
        B = Math.sin(o);
        z = Math.cos(o);
        E = B / z;
        u *= Math.pow(z, 2.0d);
        A = b - A;
        o = (((o - (Math.pow(A, 2.0d) * (E / (((2.0d * H) * G) * Math.pow(j, 2.0d))))) + (Math.pow(A, 4.0d) * ((((((5.0d + (3.0d * Math.pow(E, 2.0d))) + u) - (4.0d * Math.pow(u, 2.0d))) - ((9.0d * Math.pow(E, 2.0d)) * u)) * E) / (((24.0d * H) * Math.pow(G, 3.0d)) * Math.pow(j, 4.0d))))) - (Math.pow(A, 6.0d) * ((((((((((((((61.0d + (90.0d * Math.pow(E, 2.0d))) + (46.0d * u)) + (45.0d * Math.pow(E, 4.0d))) - ((252.0d * Math.pow(E, 2.0d)) * u)) - (3.0d * Math.pow(u, 2.0d))) + (100.0d * Math.pow(u, 3.0d))) - ((66.0d * Math.pow(E, 2.0d)) * Math.pow(u, 2.0d))) - ((90.0d * Math.pow(E, 4.0d)) * u)) + (88.0d * Math.pow(u, 4.0d))) + ((225.0d * Math.pow(E, 4.0d)) * Math.pow(u, 2.0d))) + ((84.0d * Math.pow(E, 2.0d)) * Math.pow(u, 3.0d))) - ((192.0d * Math.pow(E, 2.0d)) * Math.pow(u, 4.0d))) * E) / (((720.0d * H) * Math.pow(G, 5.0d)) * Math.pow(j, 6.0d))))) + (Math.pow(A, 8.0d) * (((((1385.0d + (3633.0d * Math.pow(E, 2.0d))) + (4095.0d * Math.pow(E, 4.0d))) + (1575.0d * Math.pow(E, 6.0d))) * E) / (((40320.0d * H) * Math.pow(G, 7.0d)) * Math.pow(j, 8.0d))));
        this.f8x = (D + ((((A * (m_TMODE / ((G * z) * j))) - (Math.pow(A, 3.0d) * (((m_TMODE + (2.0d * Math.pow(E, 2.0d))) + u) / (((6.0d * Math.pow(G, 3.0d)) * z) * Math.pow(j, 3.0d))))) + (Math.pow(A, 5.0d) * (((((((((5.0d + (6.0d * u)) + (28.0d * Math.pow(E, 2.0d))) - (3.0d * Math.pow(u, 2.0d))) + ((8.0d * Math.pow(E, 2.0d)) * u)) + (24.0d * Math.pow(E, 4.0d))) - (4.0d * Math.pow(u, 3.0d))) + ((4.0d * Math.pow(E, 2.0d)) * Math.pow(u, 2.0d))) + ((24.0d * Math.pow(E, 2.0d)) * Math.pow(u, 3.0d))) / (((120.0d * Math.pow(G, 5.0d)) * z) * Math.pow(j, 5.0d))))) - (Math.pow(A, 7.0d) * ((((61.0d + (662.0d * Math.pow(E, 2.0d))) + (1320.0d * Math.pow(E, 4.0d))) + (720.0d * Math.pow(E, 6.0d))) / (((5040.0d * Math.pow(G, 7.0d)) * z) * Math.pow(j, 7.0d)))))) / w;
        this.f9y = o / w;
    }

    private void setParameter(double a, double b, double d, double e, double h, double g, double j, double l) {
        double m = Math.atan(m_TMODE) / 45.0d;
        this.m_dx = a;
        this.m_dy = b;
        this.m_dz = d;
        this.m_omega = (e / 3600.0d) * m;
        this.m_phi = (h / 3600.0d) * m;
        this.m_kappa = (g / 3600.0d) * m;
        this.m_ds = 1.0E-6d * j;
        this.m_imode = l;
    }

    private void shiftIsland(boolean d) {
        double x;
        double y;
        double e = m_ux0;
        double h = m_ux0;
        int i;
        if (!d) {
            x = this.f8x / 2.5d;
            y = this.f9y / 2.5d;
            i = 0;
            while (i < this.rectArray2.length) {
                if (x - this.rectArray2[i].f6x >= m_ux0 && x - this.rectArray2[i].f6x <= this.rectArray2[i].f5w && y - this.rectArray2[i].f7y >= m_ux0 && y - this.rectArray2[i].f7y <= this.rectArray2[i].f4h) {
                    x += this.deltaValue2[i][0];
                    y += this.deltaValue2[i][1];
                    break;
                }
                i++;
            }
        } else {
            i = 0;
            while (i < this.rectArray1.length) {
                if (this.f8x - this.rectArray1[i].f6x >= m_ux0 && this.f8x - this.rectArray1[i].f6x <= this.rectArray1[i].f5w && this.f9y - this.rectArray1[i].f7y >= m_ux0 && this.f9y - this.rectArray1[i].f7y <= this.rectArray1[i].f4h) {
                    e = m_ux0 + this.deltaValue1[i][0];
                    h = m_ux0 + this.deltaValue1[i][1];
                    break;
                }
                i++;
            }
            x = (double) ((int) (((this.f8x + e) * 2.5d) + 0.5d));
            y = (double) ((int) (((this.f9y + h) * 2.5d) + 0.5d));
        }
        this.f8x = x;
        this.f9y = y;
    }
}

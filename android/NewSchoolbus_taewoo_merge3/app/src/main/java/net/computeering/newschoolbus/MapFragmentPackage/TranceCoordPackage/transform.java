package net.computeering.newschoolbus.MapFragmentPackage.TranceCoordPackage;


public class transform {
    public CoordPoint trans(String x, String y) {
        CoordPoint pt = new CoordPoint(Double.parseDouble(x), Double.parseDouble(y));
        //int fromType = Coords(from);
        //int toType = Coords(to);
        //if (pass == 0) {
            return TransCoord.getTransCoord(pt, 5, 10);
       // }
//        if (pass == 1) {
//            return TransCoord.getTransCoord(pt, fromType, 5);
//        }
        //return null;
    }

    public CoordPoint transBack(String x, String y) {
        CoordPoint pt = new CoordPoint(Double.parseDouble(x), Double.parseDouble(y));
        //int fromType = Coords(from);
        //int toType = Coords(to);
        //if (pass == 0) {
        return TransCoord.getTransCoord(pt, 10, 5);
        // }
//        if (pass == 1) {
//            return TransCoord.getTransCoord(pt, fromType, 5);
//        }
        //return null;
    }

    public int Coords(String coord) {
        if (coord.equals("TM")) {
            return 1;
        }
        if (coord.equals("KTM")) {
            return 2;
        }
        if (coord.equals("UTM")) {
            return 3;
        }
        if (coord.equals("CONGNAMUL")) {
            return 4;
        }
        if (coord.equals("WGS84")) {
            return 5;
        }
        if (coord.equals("BESSEL")) {
            return 6;
        }
        if (coord.equals("WTM")) {
            return 7;
        }
        if (coord.equals("WKTM")) {
            return 8;
        }
        if (coord.equals("WCONGNAMUL")) {
            return 10;
        }
        return 0;
    }
}

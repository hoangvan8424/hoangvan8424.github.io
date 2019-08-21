/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package DAL;
import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.Vector;
import javax.swing.JTable;
import javax.swing.JTextArea;
import javax.swing.table.DefaultTableModel;

/**
 *
 * @author Hoang
 */
public class HoaDonDAL {
    KetNoiDB kn = new KetNoiDB();
    public static JTextArea jTextArea;
    public void inHD(int maBan){     
        jTextArea = new JTextArea();
        jTextArea.append("\t\t----------------------Hóa đơn----------------\n\n");
        
        Connection connection = kn.connection();
        Statement st;
        ResultSet rs;
        String query = "SELECT TENMON, GIA, SOLUONG, GIA * SOLUONG AS THANHTIEN\n" +
                       "FROM HOADON AS HD, THUCDON AS TD\n" +
                       "WHERE HD.MAMON = TD.MAMON AND HD.MABAN = '"+maBan+"' AND HD.TRANGTHAI = 0";
        try{
            st = connection.createStatement();
            rs = st.executeQuery(query);
            while(rs.next()){
                jTextArea.append(rs.getString(1)+" \t "+" Giá = "+rs.getFloat(2)+" VND "+" \t "+" Số lượng = "+rs.getInt(3));
                jTextArea.append("\n\t\t------------------------------------------------------\n");
            }
        }catch(Exception ex){
            ex.printStackTrace();
        }
    }
    public void getHoaDonList(int maBan, JTable tbmondagoi){
   
       Connection connection = kn.connection();
       Statement st;
       ResultSet rs;
       tbmondagoi.removeAll();
       String query = "SELECT TD.MAMON, TENMON, GIA, SOLUONG, GIA * SOLUONG AS THANHTIEN\n" +
                       "FROM HOADON AS HD, THUCDON AS TD\n" +
                       "WHERE HD.MAMON = TD.MAMON AND HD.MABAN = '"+maBan+"' AND HD.TRANGTHAI = 0";
       try {
           st = connection.createStatement();
           rs = st.executeQuery(query);

           
            
            String [] arr = {"Mã Món","Tên Món", "Giá", "Số Lượng", "Thành Tiền"};
            DefaultTableModel model = new DefaultTableModel(arr, 0);
            while (rs.next())
            {
                
                Vector vec = new Vector();
                vec.add(rs.getString(1));
                vec.add(rs.getString(2));
                vec.add(rs.getString(3));
                vec.add(rs.getString(4));
                vec.add(rs.getString(5));
                model.addRow(vec);     
            }
          
            tbmondagoi.setModel(model);

       } 
      catch (SQLException e) {
           e.printStackTrace();
       }
       
   }
    
    
}

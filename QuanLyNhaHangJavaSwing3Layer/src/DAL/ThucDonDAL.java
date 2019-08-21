/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package DAL;

import DTO.ThucDonDTO;
import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.Vector;
import javax.swing.JTable;
import javax.swing.table.DefaultTableModel;

/**
 *
 * @author Hoang
 */
public class ThucDonDAL {
    KetNoiDB kn = new KetNoiDB();
    public ArrayList<ThucDonDTO> getThucDon(){
   
       ArrayList<ThucDonDTO> dSThucDon = new ArrayList<>();
       Connection connection = kn.connection();
       
       String query = "SELECT * FROM  thucdon ";
       Statement st;
       ResultSet rs;
       
       try {
           st = connection.createStatement();
           rs = st.executeQuery(query);

           while(rs.next())
           {
               
                ThucDonDTO menu = new ThucDonDTO(rs.getInt(1), rs.getString(2), rs.getString(3), rs.getFloat(4));
                dSThucDon.add(menu);
           }

       } 
      catch (Exception e) {
           e.printStackTrace();
       }
       return dSThucDon;
    }
    public ArrayList<ThucDonDTO> getThucDonTimKiem(String tenMon){
   
       ArrayList<ThucDonDTO> dSThucDon = new ArrayList<>();
       Connection connection = kn.connection();
       
       String query = "SELECT * FROM  THUCDON WHERE [TENMON] LIKE N'%"+ tenMon +"%'";
       Statement st;
       ResultSet rs;
       
       try {
           st = connection.createStatement();
           rs = st.executeQuery(query);

           while(rs.next())
           {
               
                ThucDonDTO menu = new ThucDonDTO(rs.getInt(1), rs.getString(2), rs.getString(3), rs.getFloat(4));
                dSThucDon.add(menu);
           }

       } 
      catch (Exception e) {
           e.printStackTrace();
       }
       return dSThucDon;
   }
    
    
    public void loadThucDonTheoTenLoai(JTable table, String tenLoai){
        Connection connection = kn.connection();
        Statement st;
        ResultSet rs;
        String query = "SELECT * FROM  THUCDON WHERE [TENLOAI] = '"+tenLoai+"'";
        try {
                    
            st = connection.createStatement();
            rs = st.executeQuery(query);
            String [] arr = {"Mã Món","Tên Món", "Giá"};
            DefaultTableModel model = new DefaultTableModel(arr, 0);
            while (rs.next())
            {
                Vector vec = new Vector();
                vec.add(rs.getString(1));
                vec.add(rs.getString(3));
                vec.add(rs.getString(4));
                model.addRow(vec);     
            }
            table.setModel(model);
        } catch (SQLException e) {
        }
    }
    
}

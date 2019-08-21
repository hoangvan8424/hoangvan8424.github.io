/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package BLL;

import DAL.KetNoiDB;
import DAL.ThucDonDAL;
import DTO.ThucDonDTO;
import java.awt.HeadlessException;
import java.sql.Connection;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import javax.swing.JOptionPane;
import javax.swing.JTable;
import javax.swing.table.DefaultTableModel;

/**
 *
 * @author Hoang
 */
public class ThucDonBLL {
    KetNoiDB kn = new KetNoiDB();
    ThucDonDAL tdDAL = new ThucDonDAL();
    public void hienThiLenBang(JTable table){
        
       ArrayList<ThucDonDTO> list = tdDAL.getThucDon();
       DefaultTableModel model = (DefaultTableModel)table.getModel();
       Object[] row = new Object[4];
       for(int i = 0; i < list.size(); i++)
       {
           row[0] = list.get(i).getMaMon();
           row[1] = list.get(i).getTenLoai();
           row[2] = list.get(i).getTenMon();
           row[3] = list.get(i).getGia();
           
                                            
           model.addRow(row);
       }
    }
    public void luuVaoSQL(String query, String message, JTable table){
       Connection con = kn.connection();
       Statement st;
       try{
           st = con.createStatement();
           if((st.executeUpdate(query))==1)
           {
               
               DefaultTableModel model = (DefaultTableModel)table.getModel();
               model.setRowCount(0);
               hienThiLenBang(table);
               
               JOptionPane.showMessageDialog(null, message+" thành công!");
           }else{
               JOptionPane.showMessageDialog(null, message+" thất bại!");
           }
       }catch(HeadlessException | SQLException ex){
           JOptionPane.showMessageDialog(null, message+" món ăn thất bại!");
       }
    }
    public void them(String tenLoai, String tenmon, float gia, JTable table){
        
        String query = "INSERT INTO THUCDON([TENLOAI], [TENMON], [GIA])" +
                    "VALUES(N'"+tenLoai+"', N'"+tenmon+"', '"+gia+"')";
        luuVaoSQL(query, "Thêm món", table);
    }
    public void capNhat(String tenMon, float gia, int maMon, String tenLoai, JTable table){
        String query= "UPDATE THUCDON SET [TENMON] = N'"+ tenMon +"', [GIA] = '"+ gia +"'"
            +"WHERE MAMON='"+ maMon +"' AND [TENLOAI] = N'"+ tenLoai +"'";
        luuVaoSQL(query, "Cập nhật món ăn", table);
    }
    public void xoa(int maMon, JTable table){
        String query= "DELETE FROM THUCDON" + " WHERE [MAMON] ='"+ maMon +"' ";
        luuVaoSQL(query, "Xóa món ăn", table);
    }
    public void HienThiKQTK(String tenMon, JTable table){
        ArrayList<ThucDonDTO> list = tdDAL.getThucDonTimKiem(tenMon);
        DefaultTableModel model = (DefaultTableModel) table.getModel();
        Object[] row = new Object[9];
        for (int i = 0; i < list.size(); i++) {
            row[0] = list.get(i).getMaMon();          
            row[1] = list.get(i).getTenLoai();
            row[2] = list.get(i).getTenMon();
            row[3] = list.get(i).getGia();
            model.addRow(row);
            
        }
        table.setModel(model);
    }
    
}

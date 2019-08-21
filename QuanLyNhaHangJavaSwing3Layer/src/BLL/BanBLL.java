/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package BLL;

import DAL.BanDAL;
import DAL.KetNoiDB;
import DTO.BanDTO;
import java.sql.Connection;
import java.sql.Statement;
import java.util.ArrayList;
import javax.swing.JOptionPane;
import javax.swing.JTable;
import javax.swing.table.DefaultTableModel;

/**
 *
 * @author Hoang
 */
public class BanBLL {
    KetNoiDB kn = new KetNoiDB();
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
       }catch(Exception ex){
           JOptionPane.showMessageDialog(null, message+" Thất bại!"+"\n'Mã Bàn' không được phép trùng nhau!");
       }
    }
    public void themBan(String tenban, JTable table){
        String query = "INSERT INTO BAN([TENBAN])\n" +
        "VALUES(N'"+tenban+"')";
        luuVaoSQL(query, "Thêm", table);
    }
    public void capNhatBan(int maban, String tenBan, JTable table){
        String query = "UPDATE BAN SET [TENBAN] = N'"+tenBan+"'\n"
                + "WHERE MABAN = '"+maban+"'";
        luuVaoSQL(query, "Cập nhật", table);
    }
    public void xoaBan(int maban, JTable table){
        String query= "DELETE FROM BAN" + " WHERE MABAN ='"+maban+"' ";
        luuVaoSQL(query, "Xóa", table);
    }
    public void hienThiLenBang(JTable table){
        BanDAL ldt = new BanDAL();
    
        ArrayList<BanDTO> list = ldt.getTableList();
        DefaultTableModel model = (DefaultTableModel)table.getModel();
        Object[] row = new Object[3];
        for(int i = 0; i < list.size(); i++)
        {
           row[0] = list.get(i).getiD();
           row[1] = list.get(i).getTenBan();
           row[2] = list.get(i).getTrangThai();                             
           model.addRow(row);
        }
    }
}

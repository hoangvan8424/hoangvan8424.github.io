/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package BLL;

import DAL.KetNoiDB;
import java.sql.Connection;
import java.sql.SQLException;
import java.sql.Statement;
import javax.swing.JOptionPane;
import javax.swing.JTable;
import javax.swing.table.DefaultTableModel;

/**
 *
 * @author Hoang
 */
public class HoaDonBLL {
    KetNoiDB kn = new KetNoiDB();
    public void luuVaoSQL(String query){
       Connection con = kn.connection();
       Statement st;
       try{
           st = con.createStatement();
           st.executeUpdate(query);
       }catch(SQLException ex){
           JOptionPane.showMessageDialog(null, "Thất bại!");
       }
    }
    public void capNhatTrangThaiBan(int maBan, String trangThai){
        if(trangThai.equals("Trống")){
            String query = "UPDATE BAN SET [TRANGTHAI] = N'Trống'\n"
                + "WHERE MABAN = '"+maBan+"'";
            luuVaoSQL(query);
        }
        else if(trangThai.equals("Đã đặt trước")){
            String query = "UPDATE BAN SET [TRANGTHAI] = N'Đã đặt trước'\n"
                + "WHERE MABAN = '"+maBan+"'";
            luuVaoSQL(query);
        }
    }
    public void themMon(int maBan, int maMon, int soLuong, String tenNguoiDung){
        String query = "EXEC INSERT_HD\n" +
                        "@maban = '"+maBan+"', @mamon = '"+maMon+"', @soluong = '"+soLuong+"', @tennguoidung = '"+tenNguoiDung+"'";
        luuVaoSQL(query);
        JOptionPane.showMessageDialog(null, "Đã 1 thêm món!");
        
    }
    public void xoaMon(int maMon, int maBan, JTable table){
        String query = "DELETE HOADON\n" +
                        "WHERE MABAN = '"+maBan+"' AND MAMON = '"+maMon+"' AND TRANGTHAI = 0";
        luuVaoSQL(query);
        JOptionPane.showMessageDialog(null, "Đã xóa 1 món!");
    }
    public void thanhToan(float tongtien, int giamGia, int maBan, JTable table){
        String query = "UPDATE HOADON\n" +
                "SET TRANGTHAI = 1, TONGTIEN = '"+tongtien+"', NGAYRA = GETDATE(), GIAMGIA = '"+giamGia+"' \n"
                + "WHERE MABAN = '"+maBan+"' AND TRANGTHAI = 0";
        luuVaoSQL(query);
    }
}

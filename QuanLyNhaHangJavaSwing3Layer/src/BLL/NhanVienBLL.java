/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package BLL;

import DAL.KetNoiDB;
import DAL.NhanVienDAL;
import DTO.NhanVienDTO;
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
public class NhanVienBLL {
    KetNoiDB kn = new KetNoiDB();
    NhanVienDAL nvdal = new NhanVienDAL();
    public void hienThiLenBang(JTable table) {
        ArrayList<NhanVienDTO>list = nvdal.getUsersList();
        DefaultTableModel model = (DefaultTableModel) table.getModel();
        Object[] row = new Object[9];
        for (int i = 0; i < list.size(); i++) {
            row[0] = list.get(i).getTenNguoiDung();
            row[1] = list.get(i).getMk();
            row[2] = list.get(i).getHoTen();
            row[3] = list.get(i).getNgaySinh();
            row[4] = list.get(i).getGioiTinh();
            row[5] = list.get(i).getDiaChi();
            row[6] = list.get(i).getsDT();
            row[7] = list.get(i).getViTri();
            model.addRow(row);
            table.setModel(model);
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
       }catch(Exception ex){
           System.out.println(ex);
           JOptionPane.showMessageDialog(null, " Thất bại!");
       }
    }
     public void themNhanVien(String tennguoidung, String matkhau, String hoten, String ngaysinh, String gioitinh, String diachi, String sdt, String vitri, JTable table){
        String query = "INSERT INTO NHANVIEN([TENNGUOIDUNG], [MATKHAU], [HOTEN], [NGAYSINH], [GIOITINH], [DIACHI], [SDT], [VITRI])\n" +
                "VALUES('"+tennguoidung+"','"+matkhau+"',"
                + "N'"+hoten+"', '"+ngaysinh+"', N'"+gioitinh+"',"
                + "N'"+diachi+"', '"+sdt+"',N'"+vitri+"')";
         luuVaoSQL(query, "Thêm nhân viên", table);
    }
    public void capNhat(String tennguoidung, String matkhau, String hoten, String ngaysinh, String gioitinh, String diachi, String sdt, String vitri, JTable table){
        String query = "UPDATE NHANVIEN SET [MATKHAU] = '" +matkhau+ "', [HOTEN] = N'" + hoten + "',"
                + "[NGAYSINH]='" + ngaysinh + "', [GIOITINH]=N'" + gioitinh + "',"
                + "[DIACHI]=N'" + diachi + "', [SDT]='" + sdt + "', [VITRI]= N'" + vitri + "'"
                    + "WHERE TENNGUOIDUNG ='" + tennguoidung + "'";
        luuVaoSQL(query, "Cập nhật nhân viên", table);
    }
    public void xoa(String tennguoidung, JTable table){
        String query = "DELETE FROM NHANVIEN" + " WHERE TENNGUOIDUNG ='" + tennguoidung + "' ";
        luuVaoSQL(query, "Xóa nhân viên", table);
    }
    public void hienThiKetQuaTimKiem(JTable table, String url) {
        
        ArrayList<NhanVienDTO> list =nvdal.getUsersListTimKiem(url);
        DefaultTableModel model = (DefaultTableModel) table.getModel();
        Object[] row = new Object[9];
        for (int i = 0; i < list.size(); i++) {
            row[0] = list.get(i).getTenNguoiDung();
            row[1] = list.get(i).getMk();
            row[2] = list.get(i).getHoTen();
            row[3] = list.get(i).getNgaySinh();
            row[4] = list.get(i).getGioiTinh();
            row[5] = list.get(i).getDiaChi();
            row[6] = list.get(i).getsDT();
            row[7] = list.get(i).getViTri();
            model.addRow(row);
            
        }
        table.setModel(model);
    }
}

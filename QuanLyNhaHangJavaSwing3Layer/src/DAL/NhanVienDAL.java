/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package DAL;

import DTO.NhanVienDTO;
import GUI.QuyenAdminGUI;
import GUI.QuyenNVGUI;
import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.JTable;
import javax.swing.table.DefaultTableModel;

/**
 *
 * @author Hoang
 */
public class NhanVienDAL {
    KetNoiDB kn = new KetNoiDB();
    Statement st;
    ResultSet rs;
    
    public ArrayList<NhanVienDTO> getUsersList() {

        ArrayList<NhanVienDTO> usersList = new ArrayList<>();
        Connection connection = kn.connection();

        String query = "SELECT * FROM  NHANVIEN";
        

        try {
            st = connection.createStatement();
            rs = st.executeQuery(query);

           

            while (rs.next()) {
                NhanVienDTO user = new NhanVienDTO(rs.getString("TENNGUOIDUNG"), rs.getString("MATKHAU"), rs.getString("HOTEN"),
                        rs.getString("NGAYSINH"), rs.getString("GIOITINH"), rs.getString("DIACHI"), rs.getString("SDT"), rs.getString("VITRI"));
                usersList.add(user);
            }

        } catch (Exception e) {
            e.printStackTrace();
        }
        return usersList;
    }
    public boolean dangNhap(String tennd, String pass){
        Connection conn = kn.connection();
        String sql="SELECT *FROM NHANVIEN\n"+ "WHERE TENNGUOIDUNG = '"+tennd+"' AND MATKHAU = '"+pass+"'";
        try {
            st = conn.createStatement();
            rs = st.executeQuery(sql);
                
                if(rs.next()){
                    
                    String vt = rs.getString("VITRI");
                    if(vt.equals("Quản lý")){
                        QuyenAdminGUI admin = new QuyenAdminGUI();
                        admin.setVisible(true);
                        
                    }
                    
                    else if(vt.equals("Nhân viên")){
                        QuyenNVGUI nv = new QuyenNVGUI();
                        nv.setVisible(true);
                    }
                    return true;
                }
        } catch (SQLException ex) {
            Logger.getLogger(NhanVienDAL.class.getName()).log(Level.SEVERE, null, ex);
        }
        return false;
    }
    public ArrayList<NhanVienDTO> getUsersListTimKiem(String urtoSearch) {
        ArrayList<NhanVienDTO> usersListTimKiem = new ArrayList<>();
        Connection connection = kn.connection();
        
        String query = "SELECT * FROM  NHANVIEN where [HOTEN] LIKE N'%" + urtoSearch + "%'";
        Statement st;
        ResultSet rs;

        try {
            st = connection.createStatement();
            rs = st.executeQuery(query);

            NhanVienDTO nv;

            while (rs.next()) {
                nv = new NhanVienDTO(rs.getString("TENNGUOIDUNG"), rs.getString("MATKHAU"), rs.getString("HOTEN"),
                        rs.getString("NGAYSINH"), rs.getString("GIOITINH"), rs.getString("DIACHI"), rs.getString("SDT"), rs.getString("VITRI"));
                usersListTimKiem.add(nv);
            }

        } catch (Exception e) {
            e.printStackTrace();
        }
        return usersListTimKiem;
    }
    

}

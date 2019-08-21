/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package DTO;

/**
 *
 * @author Hoang
 */
public class BanDTO {
    private int iD;
    private String tenBan;
    private String trangThai;

    public BanDTO() {
    }

    public BanDTO(int iD, String tenBan, String trangThai) {
        this.iD = iD;
        this.tenBan = tenBan;
        this.trangThai = trangThai;
    }

    public BanDTO(int iD, String tenBan) {
        this.iD = iD;
        this.tenBan = tenBan;
    }
    
    public int getiD() {
        return iD;
    }

    public void setiD(int iD) {
        this.iD = iD;
    }

    public String getTenBan() {
        return tenBan;
    }

    public void setTenBan(String tenBan) {
        this.tenBan = tenBan;
    }

    public String getTrangThai() {
        return trangThai;
    }

    public void setTrangThai(String trangThai) {
        this.trangThai = trangThai;
    }
    
    
}

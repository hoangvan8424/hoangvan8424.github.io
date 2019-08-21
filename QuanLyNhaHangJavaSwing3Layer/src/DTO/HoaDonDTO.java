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
public class HoaDonDTO {
    private int maMon;
    private String tenMon;
    private String tenLoai;
    private float gia;

    public HoaDonDTO() {
    }

    public HoaDonDTO(int maMon, String tenMon, String tenLoai, float gia) {
        this.maMon = maMon;
        this.tenMon = tenMon;
        this.tenLoai = tenLoai;
        this.gia = gia;
    }

    public int getMaMon() {
        return maMon;
    }

    public void setMaMon(int maMon) {
        this.maMon = maMon;
    }

    public String getTenMon() {
        return tenMon;
    }

    public void setTenMon(String tenMon) {
        this.tenMon = tenMon;
    }

    public String getTenLoai() {
        return tenLoai;
    }

    public void setTenLoai(String tenLoai) {
        this.tenLoai = tenLoai;
    }

    public float getGia() {
        return gia;
    }

    public void setGia(float gia) {
        this.gia = gia;
    }
    
}

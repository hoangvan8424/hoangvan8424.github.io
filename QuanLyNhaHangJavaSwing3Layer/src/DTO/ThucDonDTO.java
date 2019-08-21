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
public class ThucDonDTO {


    private int maMon;
    private String tenLoai;
    private String tenMon;
    private float gia;

    public ThucDonDTO() {
    }

    public ThucDonDTO(int maMon, String tenLoai, String tenMon, float gia) {
        this.maMon = maMon;
        this.tenLoai = tenLoai;
        this.tenMon = tenMon;
        this.gia = gia;
    }

    public int getMaMon() {
        return maMon;
    }

    public void setMaMon(int maMon) {
        this.maMon = maMon;
    }

    public String getTenLoai() {
        return tenLoai;
    }

    public void setTenLoai(String tenLoai) {
        this.tenLoai = tenLoai;
    }

    public String getTenMon() {
        return tenMon;
    }

    public void setTenMon(String tenMon) {
        this.tenMon = tenMon;
    }

    public float getGia() {
        return gia;
    }

    public void setGia(float gia) {
        this.gia = gia;
    }

    
    
    
    
}



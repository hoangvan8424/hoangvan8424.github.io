/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package GUI;
import BLL.NhanVienBLL;
import DAL.NhanVienDAL;
import java.sql.Connection;

import javax.swing.JOptionPane;
import javax.swing.table.DefaultTableModel;
import javax.swing.table.TableModel;

/**
 *
 * @author Hoang
 */
public class NhanVienGUI extends javax.swing.JFrame {

    /**
     * Creates new form NhanVien
     */
    DefaultTableModel tbn = new DefaultTableModel();
    Connection conn = null;
    NhanVienBLL nvBLL = new NhanVienBLL();
    NhanVienDAL nvdal = new NhanVienDAL();
    public NhanVienGUI() {
        initComponents();
        setSize(1335, 700);
        setTitle("Quản lý nhân viên");
        setLocationRelativeTo(null);
        nvBLL.hienThiLenBang(table1);
    }

    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        buttonGroup1 = new javax.swing.ButtonGroup();
        jPanel1 = new javax.swing.JPanel();
        txttimkiem = new javax.swing.JTextField();
        btntimkiem = new javax.swing.JButton();
        jButton2 = new javax.swing.JButton();
        jPanel3 = new javax.swing.JPanel();
        jPanel2 = new javax.swing.JPanel();
        jPanel5 = new javax.swing.JPanel();
        btthem = new javax.swing.JButton();
        btcapnhat = new javax.swing.JButton();
        btxoa = new javax.swing.JButton();
        jButton6 = new javax.swing.JButton();
        jPanel6 = new javax.swing.JPanel();
        tfnam = new javax.swing.JRadioButton();
        jLabel3 = new javax.swing.JLabel();
        tftennguoidung = new javax.swing.JTextField();
        jLabel2 = new javax.swing.JLabel();
        tfdiachi = new javax.swing.JTextField();
        tfmk = new javax.swing.JTextField();
        jLabel4 = new javax.swing.JLabel();
        jLabel6 = new javax.swing.JLabel();
        tfhoten = new javax.swing.JTextField();
        tfsdt = new javax.swing.JTextField();
        tfngaysinh = new javax.swing.JTextField();
        tfnu = new javax.swing.JRadioButton();
        jLabel7 = new javax.swing.JLabel();
        jLabel8 = new javax.swing.JLabel();
        tfvitri = new javax.swing.JTextField();
        jLabel9 = new javax.swing.JLabel();
        jLabel5 = new javax.swing.JLabel();
        jPanel4 = new javax.swing.JPanel();
        jScrollPane1 = new javax.swing.JScrollPane();
        table1 = new javax.swing.JTable();

        setDefaultCloseOperation(javax.swing.WindowConstants.DISPOSE_ON_CLOSE);
        addWindowListener(new java.awt.event.WindowAdapter() {
            public void windowClosing(java.awt.event.WindowEvent evt) {
                formWindowClosing(evt);
            }
        });

        jPanel1.setPreferredSize(new java.awt.Dimension(869, 50));
        jPanel1.setLayout(new java.awt.FlowLayout(java.awt.FlowLayout.RIGHT));

        txttimkiem.setFont(new java.awt.Font("Cambria", 0, 14)); // NOI18N
        txttimkiem.setText("Nhập tên để tìm kiếm");
        txttimkiem.setBorder(javax.swing.BorderFactory.createLineBorder(new java.awt.Color(0, 0, 0)));
        txttimkiem.setPreferredSize(new java.awt.Dimension(200, 42));
        txttimkiem.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                txttimkiemMouseClicked(evt);
            }
        });
        jPanel1.add(txttimkiem);

        btntimkiem.setFont(new java.awt.Font("Times New Roman", 0, 18)); // NOI18N
        btntimkiem.setIcon(new javax.swing.ImageIcon(getClass().getResource("/HinhAnh/ModernXP-20-Seach-icon.png"))); // NOI18N
        btntimkiem.setText("Tìm Kiếm");
        btntimkiem.setBorder(null);
        btntimkiem.setPreferredSize(new java.awt.Dimension(200, 42));
        btntimkiem.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btntimkiemActionPerformed(evt);
            }
        });
        jPanel1.add(btntimkiem);

        jButton2.setFont(new java.awt.Font("Times New Roman", 0, 18)); // NOI18N
        jButton2.setIcon(new javax.swing.ImageIcon(getClass().getResource("/HinhAnh/yellow-home-icon.png"))); // NOI18N
        jButton2.setText("Home");
        jButton2.setBorder(null);
        jButton2.setPreferredSize(new java.awt.Dimension(120, 42));
        jButton2.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jButton2ActionPerformed(evt);
            }
        });
        jPanel1.add(jButton2);

        getContentPane().add(jPanel1, java.awt.BorderLayout.PAGE_START);

        jPanel3.setPreferredSize(new java.awt.Dimension(1230, 600));

        jPanel2.setBackground(new java.awt.Color(255, 255, 255));
        jPanel2.setBorder(javax.swing.BorderFactory.createLineBorder(new java.awt.Color(0, 0, 0)));
        jPanel2.setPreferredSize(new java.awt.Dimension(400, 500));

        jPanel5.setLayout(new java.awt.FlowLayout(java.awt.FlowLayout.CENTER, 20, 10));

        btthem.setFont(new java.awt.Font("Cambria", 1, 14)); // NOI18N
        btthem.setIcon(new javax.swing.ImageIcon(getClass().getResource("/HinhAnh/add-icon_1.png"))); // NOI18N
        btthem.setText("Thêm");
        btthem.setPreferredSize(new java.awt.Dimension(150, 40));
        btthem.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btthemActionPerformed(evt);
            }
        });
        jPanel5.add(btthem);

        btcapnhat.setFont(new java.awt.Font("Cambria", 1, 14)); // NOI18N
        btcapnhat.setIcon(new javax.swing.ImageIcon(getClass().getResource("/HinhAnh/Button-Refresh-icon (1).png"))); // NOI18N
        btcapnhat.setText("Cập Nhật");
        btcapnhat.setPreferredSize(new java.awt.Dimension(150, 40));
        btcapnhat.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btcapnhatActionPerformed(evt);
            }
        });
        jPanel5.add(btcapnhat);

        btxoa.setFont(new java.awt.Font("Cambria", 1, 14)); // NOI18N
        btxoa.setIcon(new javax.swing.ImageIcon(getClass().getResource("/HinhAnh/Button-Close-icon (2).png"))); // NOI18N
        btxoa.setText("Xóa");
        btxoa.setPreferredSize(new java.awt.Dimension(150, 40));
        btxoa.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btxoaActionPerformed(evt);
            }
        });
        jPanel5.add(btxoa);

        jButton6.setFont(new java.awt.Font("Cambria", 1, 14)); // NOI18N
        jButton6.setIcon(new javax.swing.ImageIcon(getClass().getResource("/HinhAnh/Sign-Restart-icon.png"))); // NOI18N
        jButton6.setText("Làm Mới");
        jButton6.setPreferredSize(new java.awt.Dimension(150, 40));
        jButton6.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jButton6ActionPerformed(evt);
            }
        });
        jPanel5.add(jButton6);

        jPanel6.setBackground(new java.awt.Color(255, 255, 255));

        buttonGroup1.add(tfnam);
        tfnam.setFont(new java.awt.Font("Tahoma", 0, 15)); // NOI18N
        tfnam.setText("Nam");

        jLabel3.setFont(new java.awt.Font("Cambria", 1, 16)); // NOI18N
        jLabel3.setText("Mật Khẩu");

        tftennguoidung.setFont(new java.awt.Font("Cambria", 0, 15)); // NOI18N

        jLabel2.setFont(new java.awt.Font("Cambria", 1, 16)); // NOI18N
        jLabel2.setText("Tên Người Dùng");

        tfdiachi.setFont(new java.awt.Font("Cambria", 0, 15)); // NOI18N

        tfmk.setFont(new java.awt.Font("Cambria", 0, 15)); // NOI18N

        jLabel4.setFont(new java.awt.Font("Cambria", 1, 16)); // NOI18N
        jLabel4.setText("Họ Tên");

        jLabel6.setFont(new java.awt.Font("Cambria", 1, 16)); // NOI18N
        jLabel6.setText("Giới Tính");

        tfhoten.setFont(new java.awt.Font("Cambria", 0, 15)); // NOI18N

        tfsdt.setFont(new java.awt.Font("Cambria", 0, 15)); // NOI18N

        tfngaysinh.setFont(new java.awt.Font("Cambria", 0, 15)); // NOI18N

        buttonGroup1.add(tfnu);
        tfnu.setFont(new java.awt.Font("Tahoma", 0, 15)); // NOI18N
        tfnu.setText("Nữ");

        jLabel7.setFont(new java.awt.Font("Cambria", 1, 16)); // NOI18N
        jLabel7.setText("Địa Chỉ");

        jLabel8.setFont(new java.awt.Font("Cambria", 1, 16)); // NOI18N
        jLabel8.setText("SĐT");

        tfvitri.setFont(new java.awt.Font("Cambria", 0, 15)); // NOI18N

        jLabel9.setFont(new java.awt.Font("Cambria", 1, 16)); // NOI18N
        jLabel9.setText("Vị Trí");

        jLabel5.setFont(new java.awt.Font("Cambria", 1, 16)); // NOI18N
        jLabel5.setText("Ngày Sinh");

        javax.swing.GroupLayout jPanel6Layout = new javax.swing.GroupLayout(jPanel6);
        jPanel6.setLayout(jPanel6Layout);
        jPanel6Layout.setHorizontalGroup(
            jPanel6Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel6Layout.createSequentialGroup()
                .addContainerGap()
                .addGroup(jPanel6Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(jLabel2)
                    .addComponent(jLabel3)
                    .addComponent(jLabel4)
                    .addComponent(jLabel5)
                    .addComponent(jLabel6)
                    .addComponent(jLabel7)
                    .addComponent(jLabel8)
                    .addComponent(jLabel9))
                .addGap(98, 98, 98)
                .addGroup(jPanel6Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                    .addGroup(jPanel6Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                        .addComponent(tfmk, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addComponent(tfhoten, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addComponent(tfngaysinh, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addComponent(tfdiachi, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addComponent(tfsdt, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addComponent(tfvitri, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addGroup(jPanel6Layout.createSequentialGroup()
                            .addComponent(tfnam)
                            .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                            .addComponent(tfnu)))
                    .addComponent(tftennguoidung, javax.swing.GroupLayout.PREFERRED_SIZE, 154, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );

        jPanel6Layout.linkSize(javax.swing.SwingConstants.HORIZONTAL, new java.awt.Component[] {tfdiachi, tfhoten, tfmk, tfngaysinh, tfsdt, tftennguoidung, tfvitri});

        jPanel6Layout.setVerticalGroup(
            jPanel6Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel6Layout.createSequentialGroup()
                .addGap(19, 19, 19)
                .addGroup(jPanel6Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel2)
                    .addComponent(tftennguoidung, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(24, 24, 24)
                .addGroup(jPanel6Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel3)
                    .addComponent(tfmk, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(26, 26, 26)
                .addGroup(jPanel6Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel4)
                    .addComponent(tfhoten, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(29, 29, 29)
                .addGroup(jPanel6Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel5)
                    .addComponent(tfngaysinh, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(28, 28, 28)
                .addGroup(jPanel6Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel6)
                    .addComponent(tfnam)
                    .addComponent(tfnu))
                .addGap(27, 27, 27)
                .addGroup(jPanel6Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel7)
                    .addComponent(tfdiachi, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(29, 29, 29)
                .addGroup(jPanel6Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel8)
                    .addComponent(tfsdt, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(29, 29, 29)
                .addGroup(jPanel6Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel9)
                    .addComponent(tfvitri, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addContainerGap(50, Short.MAX_VALUE))
        );

        jPanel6Layout.linkSize(javax.swing.SwingConstants.VERTICAL, new java.awt.Component[] {tfdiachi, tfhoten, tfmk, tfngaysinh, tfsdt, tftennguoidung, tfvitri});

        javax.swing.GroupLayout jPanel2Layout = new javax.swing.GroupLayout(jPanel2);
        jPanel2.setLayout(jPanel2Layout);
        jPanel2Layout.setHorizontalGroup(
            jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel2Layout.createSequentialGroup()
                .addContainerGap()
                .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(jPanel6, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                    .addComponent(jPanel5, javax.swing.GroupLayout.PREFERRED_SIZE, 0, Short.MAX_VALUE))
                .addContainerGap())
        );
        jPanel2Layout.setVerticalGroup(
            jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel2Layout.createSequentialGroup()
                .addContainerGap()
                .addComponent(jPanel6, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addComponent(jPanel5, javax.swing.GroupLayout.DEFAULT_SIZE, 137, Short.MAX_VALUE)
                .addGap(18, 18, 18))
        );

        jPanel4.setBorder(javax.swing.BorderFactory.createLineBorder(new java.awt.Color(0, 0, 0)));
        jPanel4.setPreferredSize(new java.awt.Dimension(792, 500));

        table1.setBackground(new java.awt.Color(255, 255, 204));
        table1.setFont(new java.awt.Font("Tahoma", 0, 15)); // NOI18N
        table1.setModel(new javax.swing.table.DefaultTableModel(
            new Object [][] {

            },
            new String [] {
                "Tên ĐN", "MK", "Họ Tên", "Ngày Sinh", "Giới Tính", "Địa Chỉ", "SĐT", "Vị Trí"
            }
        ) {
            boolean[] canEdit = new boolean [] {
                false, false, false, true, true, true, true, true
            };

            public boolean isCellEditable(int rowIndex, int columnIndex) {
                return canEdit [columnIndex];
            }
        });
        table1.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                table1MouseClicked(evt);
            }
        });
        jScrollPane1.setViewportView(table1);

        javax.swing.GroupLayout jPanel4Layout = new javax.swing.GroupLayout(jPanel4);
        jPanel4.setLayout(jPanel4Layout);
        jPanel4Layout.setHorizontalGroup(
            jPanel4Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addComponent(jScrollPane1, javax.swing.GroupLayout.DEFAULT_SIZE, 790, Short.MAX_VALUE)
        );
        jPanel4Layout.setVerticalGroup(
            jPanel4Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jPanel4Layout.createSequentialGroup()
                .addContainerGap()
                .addComponent(jScrollPane1))
        );

        javax.swing.GroupLayout jPanel3Layout = new javax.swing.GroupLayout(jPanel3);
        jPanel3.setLayout(jPanel3Layout);
        jPanel3Layout.setHorizontalGroup(
            jPanel3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel3Layout.createSequentialGroup()
                .addContainerGap()
                .addComponent(jPanel2, javax.swing.GroupLayout.PREFERRED_SIZE, 412, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(jPanel4, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addContainerGap())
        );
        jPanel3Layout.setVerticalGroup(
            jPanel3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel3Layout.createSequentialGroup()
                .addGroup(jPanel3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                    .addComponent(jPanel2, javax.swing.GroupLayout.DEFAULT_SIZE, 642, Short.MAX_VALUE)
                    .addComponent(jPanel4, javax.swing.GroupLayout.DEFAULT_SIZE, 642, Short.MAX_VALUE))
                .addGap(0, 13, Short.MAX_VALUE))
        );

        getContentPane().add(jPanel3, java.awt.BorderLayout.CENTER);

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void jButton6ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jButton6ActionPerformed

        tftennguoidung.setText("");
        tfmk.setText("");
        tfhoten.setText("");
        tfngaysinh.setText("");
        tfdiachi.setText("");
        tfvitri.setText("");
        tfsdt.setText("");
        buttonGroup1.clearSelection();
        
        DefaultTableModel m = (DefaultTableModel) table1.getModel();
        m.getDataVector().removeAllElements();
        nvBLL.hienThiLenBang(table1);
    }//GEN-LAST:event_jButton6ActionPerformed

    private void btcapnhatActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btcapnhatActionPerformed
        if (check() == true) {
            String gt;
            if (tfnam.isSelected()) {
                gt = "Nam";
            } else {
                gt = "Nữ";
            }
            String tennd  = tftennguoidung.getText();
            String mk = tfmk.getText();
            String hoten= tfhoten.getText();
            String ngaysinh = tfngaysinh.getText();
            String diachi = tfdiachi.getText();
            String vitri = tfvitri.getText();
            String sdt = tfsdt.getText();
            try{
                Float.parseFloat(sdt);
                nvBLL.capNhat(tennd, mk, hoten, ngaysinh, gt, diachi, sdt, vitri, table1);
                tftennguoidung.setText("");
                tfmk.setText("");
                tfhoten.setText("");
                tfngaysinh.setText("");
                tfdiachi.setText("");
                tfvitri.setText("");
                tfsdt.setText("");
                buttonGroup1.clearSelection();
            }catch(Exception ex){
                JOptionPane.showMessageDialog(null, "'SĐT' không được phép nhập chữ!");
            }
            
            
            
            
        } else {
            JOptionPane.showMessageDialog(null, "Hãy nhập đầy đủ thông tin!");
        }
    }//GEN-LAST:event_btcapnhatActionPerformed

    private void btthemActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btthemActionPerformed
        if (check() == true) {
             String gt;
            if(tfnam.isSelected()) gt="Nam";
            else gt="Nữ";
            String tennd  = tftennguoidung.getText();
            String mk = tfmk.getText();
            String hoten= tfhoten.getText();
            String ngaysinh = tfngaysinh.getText();
            String diachi = tfdiachi.getText();
            String sdt = tfsdt.getText();
            String vitri = tfvitri.getText();
            try{
                Float.parseFloat(sdt);
                nvBLL.themNhanVien(tennd, mk, hoten, ngaysinh, gt, diachi, sdt, vitri, table1);
                tftennguoidung.setText("");
                tfmk.setText("");
                tfhoten.setText("");
                tfngaysinh.setText("");
                tfdiachi.setText("");
                tfvitri.setText("");
                tfsdt.setText("");
                buttonGroup1.clearSelection();
            }catch(Exception ex){
                JOptionPane.showMessageDialog(null, "'SĐT' không được phép nhập chữ!");
            }
                        
            
        
        } else {
            JOptionPane.showMessageDialog(null, "Hãy nhập đầy đủ thông tin!");
        }


    }//GEN-LAST:event_btthemActionPerformed

    public boolean check() {
        if (tftennguoidung.getText().equals("") || tfmk.getText().equals("") || tfhoten.getText().equals("") || tfngaysinh.getText().equals("")
                || tfdiachi.getText().equals("") || tfsdt.getText().equals("") || tfngaysinh.getText().equals("")) {
            return false;
        } else {
            return true;
        }
    }
    private void table1MouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_table1MouseClicked
        int i = table1.getSelectedRow();
        TableModel model = table1.getModel();
        tftennguoidung.setText(model.getValueAt(i, 0).toString());
        tfmk.setText(model.getValueAt(i, 1).toString());
        tfhoten.setText(model.getValueAt(i, 2).toString());
        tfngaysinh.setText(model.getValueAt(i, 3).toString());

        String gt = model.getValueAt(i, 4).toString();
        if (gt.equals("Nam")) {
            tfnam.setSelected(true);
        } else {
            tfnu.setSelected(true);
        }

        tfdiachi.setText(model.getValueAt(i, 5).toString());
        tfsdt.setText(model.getValueAt(i, 6).toString());
        tfvitri.setText(model.getValueAt(i, 7).toString());


    }//GEN-LAST:event_table1MouseClicked

    private void btxoaActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btxoaActionPerformed

        nvBLL.xoa(tftennguoidung.getText(), table1);
        tftennguoidung.setText("");
        tfmk.setText("");
        tfhoten.setText("");
        tfngaysinh.setText("");
        tfdiachi.setText("");
        tfvitri.setText("");
        tfsdt.setText("");
        buttonGroup1.clearSelection();
        
    }//GEN-LAST:event_btxoaActionPerformed

    private void btntimkiemActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btntimkiemActionPerformed
        jPanel4.setVisible(false);
        DefaultTableModel m = (DefaultTableModel) table1.getModel();
        m.getDataVector().removeAllElements();
        jPanel4.setVisible(true);
        nvBLL.hienThiKetQuaTimKiem(table1, txttimkiem.getText());
        
        


    }//GEN-LAST:event_btntimkiemActionPerformed

    private void jButton2ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jButton2ActionPerformed
        
        this.dispose();
    }//GEN-LAST:event_jButton2ActionPerformed

    private void txttimkiemMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_txttimkiemMouseClicked
        txttimkiem.setText("");
    }//GEN-LAST:event_txttimkiemMouseClicked

    private void formWindowClosing(java.awt.event.WindowEvent evt) {//GEN-FIRST:event_formWindowClosing
        int k = JOptionPane.showConfirmDialog(null, "Thoát?", "Xác nhận?", JOptionPane.YES_NO_OPTION);
        if(k == JOptionPane.YES_OPTION){
            this.setDefaultCloseOperation(DISPOSE_ON_CLOSE);
        }
        else{
            this.setDefaultCloseOperation(DO_NOTHING_ON_CLOSE);
        }
    }//GEN-LAST:event_formWindowClosing

    /**
     * @param args the command line arguments
     */
    public static void main(String args[]) {

        java.awt.EventQueue.invokeLater(new Runnable() {
            @Override
            public void run() {
                new NhanVienGUI().setVisible(true);
            }
        });
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton btcapnhat;
    private javax.swing.JButton btntimkiem;
    private javax.swing.JButton btthem;
    private javax.swing.JButton btxoa;
    private javax.swing.ButtonGroup buttonGroup1;
    private javax.swing.JButton jButton2;
    private javax.swing.JButton jButton6;
    private javax.swing.JLabel jLabel2;
    private javax.swing.JLabel jLabel3;
    private javax.swing.JLabel jLabel4;
    private javax.swing.JLabel jLabel5;
    private javax.swing.JLabel jLabel6;
    private javax.swing.JLabel jLabel7;
    private javax.swing.JLabel jLabel8;
    private javax.swing.JLabel jLabel9;
    private javax.swing.JPanel jPanel1;
    private javax.swing.JPanel jPanel2;
    private javax.swing.JPanel jPanel3;
    private javax.swing.JPanel jPanel4;
    private javax.swing.JPanel jPanel5;
    private javax.swing.JPanel jPanel6;
    private javax.swing.JScrollPane jScrollPane1;
    private javax.swing.JTable table1;
    private javax.swing.JTextField tfdiachi;
    private javax.swing.JTextField tfhoten;
    private javax.swing.JTextField tfmk;
    private javax.swing.JRadioButton tfnam;
    private javax.swing.JTextField tfngaysinh;
    private javax.swing.JRadioButton tfnu;
    private javax.swing.JTextField tfsdt;
    private javax.swing.JTextField tftennguoidung;
    private javax.swing.JTextField tfvitri;
    private javax.swing.JTextField txttimkiem;
    // End of variables declaration//GEN-END:variables
}

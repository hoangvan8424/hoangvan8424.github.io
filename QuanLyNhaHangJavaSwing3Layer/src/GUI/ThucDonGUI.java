/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package GUI;
import BLL.ThucDonBLL;
import DAL.ThucDonDAL;
import javax.swing.JOptionPane;
import javax.swing.table.DefaultTableModel;
import javax.swing.table.TableModel;

/**
 *
 * @author Hoang
 */
public class ThucDonGUI extends javax.swing.JFrame {

    /**
     * Creates new form ThucDon
     */
    ThucDonBLL thucDonBLL = new ThucDonBLL();
    ThucDonDAL tddal = new ThucDonDAL();
    public ThucDonGUI() {
        initComponents();
        setSize(1280, 680);
        setLocationRelativeTo(null);
        tfmamon.enable(false);
        thucDonBLL.hienThiLenBang(tablethucdon);
        
    }
    
    

    
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jPanel1 = new javax.swing.JPanel();
        tftimkiem = new javax.swing.JTextField();
        jButton2 = new javax.swing.JButton();
        jButton1 = new javax.swing.JButton();
        jPanel3 = new javax.swing.JPanel();
        jScrollPane1 = new javax.swing.JScrollPane();
        tablethucdon = new javax.swing.JTable();
        jPanel2 = new javax.swing.JPanel();
        jLabel1 = new javax.swing.JLabel();
        jLabel3 = new javax.swing.JLabel();
        jLabel4 = new javax.swing.JLabel();
        jLabel5 = new javax.swing.JLabel();
        tfmamon = new javax.swing.JTextField();
        tftenmon = new javax.swing.JTextField();
        tfgia = new javax.swing.JTextField();
        jPanel4 = new javax.swing.JPanel();
        btthem = new javax.swing.JButton();
        btcapnhat = new javax.swing.JButton();
        btxoa = new javax.swing.JButton();
        btreset = new javax.swing.JButton();
        cbtenloai = new javax.swing.JComboBox<>();
        jLabel2 = new javax.swing.JLabel();

        setDefaultCloseOperation(javax.swing.WindowConstants.DISPOSE_ON_CLOSE);
        addWindowListener(new java.awt.event.WindowAdapter() {
            public void windowClosing(java.awt.event.WindowEvent evt) {
                formWindowClosing(evt);
            }
        });

        jPanel1.setBackground(new java.awt.Color(255, 255, 255));
        jPanel1.setPreferredSize(new java.awt.Dimension(1200, 50));
        jPanel1.setLayout(new java.awt.FlowLayout(java.awt.FlowLayout.RIGHT));

        tftimkiem.setFont(new java.awt.Font("Cambria", 0, 14)); // NOI18N
        tftimkiem.setText("Nhập tên món để tìm kiếm");
        tftimkiem.setBorder(javax.swing.BorderFactory.createLineBorder(new java.awt.Color(0, 0, 0)));
        tftimkiem.setPreferredSize(new java.awt.Dimension(200, 42));
        tftimkiem.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                tftimkiemMouseClicked(evt);
            }
        });
        jPanel1.add(tftimkiem);

        jButton2.setFont(new java.awt.Font("Times New Roman", 0, 18)); // NOI18N
        jButton2.setIcon(new javax.swing.ImageIcon(getClass().getResource("/HinhAnh/ModernXP-20-Seach-icon.png"))); // NOI18N
        jButton2.setText("Tìm kiếm");
        jButton2.setBorder(null);
        jButton2.setPreferredSize(new java.awt.Dimension(200, 45));
        jButton2.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jButton2ActionPerformed(evt);
            }
        });
        jPanel1.add(jButton2);

        jButton1.setFont(new java.awt.Font("Times New Roman", 0, 18)); // NOI18N
        jButton1.setIcon(new javax.swing.ImageIcon(getClass().getResource("/HinhAnh/yellow-home-icon.png"))); // NOI18N
        jButton1.setText("Home");
        jButton1.setBorder(null);
        jButton1.setPreferredSize(new java.awt.Dimension(120, 45));
        jButton1.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jButton1ActionPerformed(evt);
            }
        });
        jPanel1.add(jButton1);

        getContentPane().add(jPanel1, java.awt.BorderLayout.PAGE_START);

        jPanel3.setBackground(new java.awt.Color(255, 255, 255));
        jPanel3.setPreferredSize(new java.awt.Dimension(792, 620));

        tablethucdon.setBackground(new java.awt.Color(255, 255, 204));
        tablethucdon.setFont(new java.awt.Font("Tahoma", 0, 15)); // NOI18N
        tablethucdon.setModel(new javax.swing.table.DefaultTableModel(
            new Object [][] {

            },
            new String [] {
                "Mã Món", "Tên Loại", "Tên Món", "Giá"
            }
        ));
        tablethucdon.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                tablethucdonMouseClicked(evt);
            }
        });
        jScrollPane1.setViewportView(tablethucdon);

        jPanel2.setBackground(new java.awt.Color(255, 255, 255));
        jPanel2.setPreferredSize(new java.awt.Dimension(400, 620));

        jLabel1.setFont(new java.awt.Font("Cambria", 1, 15)); // NOI18N
        jLabel1.setText("Mã món");

        jLabel3.setFont(new java.awt.Font("Cambria", 1, 15)); // NOI18N
        jLabel3.setText("Tên Loại");

        jLabel4.setFont(new java.awt.Font("Cambria", 1, 15)); // NOI18N
        jLabel4.setText("Tên món");

        jLabel5.setFont(new java.awt.Font("Cambria", 1, 15)); // NOI18N
        jLabel5.setText("Giá");

        tfmamon.setFont(new java.awt.Font("Cambria", 0, 15)); // NOI18N

        tftenmon.setFont(new java.awt.Font("Cambria", 0, 15)); // NOI18N

        tfgia.setFont(new java.awt.Font("Cambria", 0, 15)); // NOI18N

        jPanel4.setLayout(new java.awt.FlowLayout(java.awt.FlowLayout.CENTER, 20, 20));

        btthem.setFont(new java.awt.Font("Cambria", 1, 14)); // NOI18N
        btthem.setIcon(new javax.swing.ImageIcon(getClass().getResource("/HinhAnh/add-icon_1.png"))); // NOI18N
        btthem.setText("Thêm");
        btthem.setPreferredSize(new java.awt.Dimension(150, 40));
        btthem.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btthemActionPerformed(evt);
            }
        });
        jPanel4.add(btthem);

        btcapnhat.setFont(new java.awt.Font("Cambria", 1, 14)); // NOI18N
        btcapnhat.setIcon(new javax.swing.ImageIcon(getClass().getResource("/HinhAnh/Button-Refresh-icon (1).png"))); // NOI18N
        btcapnhat.setText("Cập Nhật");
        btcapnhat.setPreferredSize(new java.awt.Dimension(150, 40));
        btcapnhat.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btcapnhatActionPerformed(evt);
            }
        });
        jPanel4.add(btcapnhat);

        btxoa.setFont(new java.awt.Font("Cambria", 1, 14)); // NOI18N
        btxoa.setIcon(new javax.swing.ImageIcon(getClass().getResource("/HinhAnh/Button-Close-icon (2).png"))); // NOI18N
        btxoa.setText("Xóa");
        btxoa.setPreferredSize(new java.awt.Dimension(150, 40));
        btxoa.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btxoaActionPerformed(evt);
            }
        });
        jPanel4.add(btxoa);

        btreset.setFont(new java.awt.Font("Cambria", 1, 14)); // NOI18N
        btreset.setIcon(new javax.swing.ImageIcon(getClass().getResource("/HinhAnh/Sign-Restart-icon.png"))); // NOI18N
        btreset.setText("Làm Mới");
        btreset.setPreferredSize(new java.awt.Dimension(150, 40));
        btreset.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btresetActionPerformed(evt);
            }
        });
        jPanel4.add(btreset);

        cbtenloai.setFont(new java.awt.Font("Cambria", 0, 15)); // NOI18N
        cbtenloai.setModel(new javax.swing.DefaultComboBoxModel<>(new String[] { "Chọn", "PIZZA", "PASTA", "FAVOURITE", "SALAD", "SMOOTHIES", "JUICE", "MILK SHAKE", "SOFT DRINK" }));

        jLabel2.setFont(new java.awt.Font("Times New Roman", 0, 14)); // NOI18N
        jLabel2.setText("VND");

        javax.swing.GroupLayout jPanel2Layout = new javax.swing.GroupLayout(jPanel2);
        jPanel2.setLayout(jPanel2Layout);
        jPanel2Layout.setHorizontalGroup(
            jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel2Layout.createSequentialGroup()
                .addGap(24, 24, 24)
                .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(jPanel2Layout.createSequentialGroup()
                        .addComponent(jLabel4, javax.swing.GroupLayout.PREFERRED_SIZE, 72, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addGap(0, 0, Short.MAX_VALUE))
                    .addGroup(jPanel2Layout.createSequentialGroup()
                        .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addComponent(jLabel1)
                            .addComponent(jLabel3, javax.swing.GroupLayout.PREFERRED_SIZE, 61, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(jLabel5))
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, 121, Short.MAX_VALUE)
                        .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addGroup(jPanel2Layout.createSequentialGroup()
                                .addComponent(tfgia, javax.swing.GroupLayout.PREFERRED_SIZE, 122, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                                .addComponent(jLabel2)
                                .addGap(0, 0, Short.MAX_VALUE))
                            .addGroup(jPanel2Layout.createSequentialGroup()
                                .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING, false)
                                    .addComponent(tfmamon, javax.swing.GroupLayout.Alignment.LEADING, javax.swing.GroupLayout.DEFAULT_SIZE, 156, Short.MAX_VALUE)
                                    .addComponent(tftenmon, javax.swing.GroupLayout.Alignment.LEADING)
                                    .addComponent(cbtenloai, javax.swing.GroupLayout.Alignment.LEADING, 0, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
                                .addContainerGap(38, Short.MAX_VALUE))))))
            .addGroup(jPanel2Layout.createSequentialGroup()
                .addContainerGap()
                .addComponent(jPanel4, javax.swing.GroupLayout.PREFERRED_SIZE, 0, Short.MAX_VALUE))
        );

        jPanel2Layout.linkSize(javax.swing.SwingConstants.HORIZONTAL, new java.awt.Component[] {tfmamon, tftenmon});

        jPanel2Layout.setVerticalGroup(
            jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel2Layout.createSequentialGroup()
                .addGap(27, 27, 27)
                .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel1)
                    .addComponent(tfmamon, javax.swing.GroupLayout.PREFERRED_SIZE, 30, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(56, 56, 56)
                .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel3)
                    .addComponent(cbtenloai, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(63, 63, 63)
                .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel4)
                    .addComponent(tftenmon, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(56, 56, 56)
                .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel5)
                    .addComponent(tfgia, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jLabel2, javax.swing.GroupLayout.PREFERRED_SIZE, 30, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, 83, Short.MAX_VALUE)
                .addComponent(jPanel4, javax.swing.GroupLayout.PREFERRED_SIZE, 154, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(61, 61, 61))
        );

        jPanel2Layout.linkSize(javax.swing.SwingConstants.VERTICAL, new java.awt.Component[] {cbtenloai, tfgia, tfmamon, tftenmon});

        javax.swing.GroupLayout jPanel3Layout = new javax.swing.GroupLayout(jPanel3);
        jPanel3.setLayout(jPanel3Layout);
        jPanel3Layout.setHorizontalGroup(
            jPanel3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel3Layout.createSequentialGroup()
                .addComponent(jPanel2, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(jScrollPane1, javax.swing.GroupLayout.DEFAULT_SIZE, 794, Short.MAX_VALUE))
        );
        jPanel3Layout.setVerticalGroup(
            jPanel3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jPanel3Layout.createSequentialGroup()
                .addGap(0, 2, Short.MAX_VALUE)
                .addComponent(jPanel2, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap())
            .addGroup(jPanel3Layout.createSequentialGroup()
                .addComponent(jScrollPane1)
                .addGap(28, 28, 28))
        );

        getContentPane().add(jPanel3, java.awt.BorderLayout.CENTER);

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void btthemActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btthemActionPerformed
        if(kiemTra() == true) JOptionPane.showMessageDialog(null, "Hãy nhập đầy đủ thông tin!");
        else{
            String tenLoai = cbtenloai.getSelectedItem().toString();
            String tenMon = tftenmon.getText();
            try{
            float gia = Float.parseFloat(tfgia.getText());
            thucDonBLL.them(tenLoai, tenMon, gia, tablethucdon);
            tfmamon.setText("");
            cbtenloai.setSelectedIndex(0);
            tftenmon.setText("");
            tfgia.setText("");
            }catch(Exception ex){
                JOptionPane.showMessageDialog(null, "Thêm món thất bại!");
            }
            
        }
    }//GEN-LAST:event_btthemActionPerformed

    private void tablethucdonMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_tablethucdonMouseClicked
        
        int i= tablethucdon.getSelectedRow();
        TableModel model = tablethucdon.getModel();
        tfmamon.setText(model.getValueAt(i, 0).toString());      
        cbtenloai.setSelectedItem(model.getValueAt(i, 1));
        tftenmon.setText(model.getValueAt(i, 2).toString());
        tfgia.setText(model.getValueAt(i, 3).toString());
        
    }//GEN-LAST:event_tablethucdonMouseClicked

    private void btcapnhatActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btcapnhatActionPerformed
        if(kiemTra() == true) JOptionPane.showMessageDialog(null, "Hãy nhập đầy đủ thông tin!");
        else{
            int maMon = Integer.parseInt(tfmamon.getText());
            String tenLoai = cbtenloai.getSelectedItem().toString();
            String tenMon = tftenmon.getText();
            try{
            float gia = Float.parseFloat(tfgia.getText());
            thucDonBLL.capNhat(tenMon, gia, maMon, tenLoai, tablethucdon);
            tfmamon.setText("");
            cbtenloai.setSelectedIndex(0);
            tftenmon.setText("");
            tfgia.setText("");
            }catch(Exception ex){
                JOptionPane.showMessageDialog(null, "Cập nhật món ăn thất bại!");
            }
        }
    }//GEN-LAST:event_btcapnhatActionPerformed

    private void btxoaActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btxoaActionPerformed
        
        int maMon = Integer.parseInt(tfmamon.getText());
        thucDonBLL.xoa(maMon, tablethucdon);
        tfmamon.setText("");
        cbtenloai.setSelectedIndex(0);
        tftenmon.setText("");
        tfgia.setText("");
    }//GEN-LAST:event_btxoaActionPerformed

    private void btresetActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btresetActionPerformed
        DefaultTableModel m = (DefaultTableModel) tablethucdon.getModel();
        m.getDataVector().removeAllElements();
        thucDonBLL.hienThiLenBang(tablethucdon);
        tfmamon.setText("");
        cbtenloai.setSelectedIndex(0);
        tftenmon.setText("");
        tfgia.setText("");
    }//GEN-LAST:event_btresetActionPerformed

    private void jButton1ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jButton1ActionPerformed
        
        this.dispose();
       
    }//GEN-LAST:event_jButton1ActionPerformed

    private void formWindowClosing(java.awt.event.WindowEvent evt) {//GEN-FIRST:event_formWindowClosing
        int k = JOptionPane.showConfirmDialog(null, "Thoát?", "Xác nhận?", JOptionPane.YES_NO_OPTION);
        if(k == JOptionPane.YES_OPTION){
            this.setDefaultCloseOperation(DISPOSE_ON_CLOSE);
        }
        else{
            this.setDefaultCloseOperation(DO_NOTHING_ON_CLOSE);
        }
    }//GEN-LAST:event_formWindowClosing

    private void tftimkiemMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_tftimkiemMouseClicked
        tftimkiem.setText("");
    }//GEN-LAST:event_tftimkiemMouseClicked

    private void jButton2ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jButton2ActionPerformed
        tablethucdon.setVisible(false);
        DefaultTableModel model = (DefaultTableModel) tablethucdon.getModel();
        model.getDataVector().removeAllElements();
        thucDonBLL.HienThiKQTK(tftimkiem.getText(), tablethucdon);
        tablethucdon.setVisible(true);
    }//GEN-LAST:event_jButton2ActionPerformed
    public boolean kiemTra(){
        if(tftenmon.getText().equals("") || tfgia.getText().equals("")) return true;
        else return false;
    }
    /**
     * @param args the command line arguments
     */
    public static void main(String args[]) {
        /* Set the Nimbus look and feel */
        //<editor-fold defaultstate="collapsed" desc=" Look and feel setting code (optional) ">
        /* If Nimbus (introduced in Java SE 6) is not available, stay with the default look and feel.
         * For details see http://download.oracle.com/javase/tutorial/uiswing/lookandfeel/plaf.html 
         */
        try {
            for (javax.swing.UIManager.LookAndFeelInfo info : javax.swing.UIManager.getInstalledLookAndFeels()) {
                if ("Nimbus".equals(info.getName())) {
                    javax.swing.UIManager.setLookAndFeel(info.getClassName());
                    break;
                }
            }
        } catch (ClassNotFoundException ex) {
            java.util.logging.Logger.getLogger(ThucDonGUI.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(ThucDonGUI.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(ThucDonGUI.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(ThucDonGUI.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>
        //</editor-fold>

        /* Create and display the form */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new ThucDonGUI().setVisible(true);
            }
        });
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton btcapnhat;
    private javax.swing.JButton btreset;
    private javax.swing.JButton btthem;
    private javax.swing.JButton btxoa;
    private javax.swing.JComboBox<String> cbtenloai;
    private javax.swing.JButton jButton1;
    private javax.swing.JButton jButton2;
    private javax.swing.JLabel jLabel1;
    private javax.swing.JLabel jLabel2;
    private javax.swing.JLabel jLabel3;
    private javax.swing.JLabel jLabel4;
    private javax.swing.JLabel jLabel5;
    private javax.swing.JPanel jPanel1;
    private javax.swing.JPanel jPanel2;
    private javax.swing.JPanel jPanel3;
    private javax.swing.JPanel jPanel4;
    private javax.swing.JScrollPane jScrollPane1;
    private javax.swing.JTable tablethucdon;
    private javax.swing.JTextField tfgia;
    private javax.swing.JTextField tfmamon;
    private javax.swing.JTextField tftenmon;
    private javax.swing.JTextField tftimkiem;
    // End of variables declaration//GEN-END:variables
}

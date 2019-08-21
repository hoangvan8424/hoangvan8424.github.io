/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package GUI;


import BLL.HoaDonBLL;
import DAL.BanDAL;
import DAL.HoaDonDAL;
import static DAL.HoaDonDAL.jTextArea;
import DAL.KetNoiDB;
import DAL.ThucDonDAL;
import DTO.BanDTO;
import static GUI.DangNhap.tenDN;
import java.awt.Color;
import java.awt.Dimension;
import java.awt.HeadlessException;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.awt.print.PrinterException;
import java.util.ArrayList;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.JButton;
import javax.swing.JOptionPane;
import javax.swing.table.DefaultTableModel;

/**
 *
 * @author Hoang
 */
public class OrderGUI extends javax.swing.JFrame {

    /**
     * Creates new form Order2
     */
    
    private float c= 0;
    private JButton button;
    private JButton btmenugroup;
    ThucDonDAL thucDonDAL = new ThucDonDAL();
    public static float tt = 0;
    BanDAL banDAL = new BanDAL();
    KetNoiDB kn = new KetNoiDB();
    HoaDonDAL hoaDonDAL = new HoaDonDAL();
    HoaDonBLL hoaDonBLL = new HoaDonBLL();
    
    public OrderGUI() {
        
    }
    public void chay(){
        
        initComponents();
        lbban.setVisible(false);
        
        loadButtonBan();
        jsgiamgia.setEnabled(false);
        
        setSize(1280, 680);
        setTitle("Order");
        setLocationRelativeTo(null);
        setVisible(true);
        jsgiamgia.setValue(10);
        soluong.setValue(1);
        jPanel2.setVisible(false);
        jPanel1.setVisible(false);
        jPanel3.setVisible(false);
        btgoimon.setVisible(false);
        btdatban.setVisible(false);
        bthuydatban.setVisible(false);
    
        setVisible(true);
    }
    
   
    
    public void loadButtonBan(){
        
        jPanel19.removeAll();
        ArrayList<BanDTO> list = banDAL.getTableList();
        
        
        for(BanDTO table : list){
            //Table table = list.get(i);
            button = new JButton();
            button.setPreferredSize(new Dimension(85, 50));
            button.setText(table.getTenBan());
            
            switch(table.getTrangThai()){
                case "Trống": button.setBackground(Color.PINK); break;
                case "Đang phục vụ": button.setBackground(Color.cyan);break;
                case "Đã đặt trước": button.setBackground(Color.yellow); break;
                
            }
            
            jPanel19.add(button);
            
            button.addActionListener(new ActionListener() {
                @Override
                public void actionPerformed(ActionEvent e) {
                    jPanel3.setVisible(true);
                    
                    lbban.setText(String.valueOf(table.getiD()));
                    lbtenban.setText(table.getTenBan());
                    lbtrangthai.setText(table.getTrangThai());
                    int maban = table.getiD();
                    switch(table.getTrangThai()){
                        case "Trống" :{
                            btdatban.setVisible(true);
                            btgoimon.setVisible(true);
                            bthuydatban.setVisible(false);
                            
                            jPanel20.setVisible(true);
                            jPanel1.setVisible(false);
                            jPanel2.setVisible(false);
                            jPanel3.setVisible(false);
                            
                        } break;
                        case "Đã đặt trước":{
                            bthuydatban.setVisible(true);
                            btgoimon.setVisible(true);
                            btdatban.setVisible(false);
                            
                            jPanel20.setVisible(true);
                            jPanel1.setVisible(false);
                            jPanel2.setVisible(false);
                            jPanel3.setVisible(false);
                        } break;
                        case "Đang phục vụ":{
                            
                            btdatban.setVisible(false);
                            btgoimon.setVisible(false);
                            bthuydatban.setVisible(false);
                            jPanel20.setVisible(false);
                            jPanel2.setVisible(false);
                            jPanel3.setVisible(true);
                            jPanel1.setVisible(false);
                            btthemnon2.setVisible(true);
                        } break;
                        
                    }
                    hoaDonDAL.getHoaDonList(maban, tbmondagoi);
                    tftongtien.setText(String.valueOf(tongTien()));
                    tfsotientra.setText(String.valueOf(soTienThucTe()));
                }
            });
            
        }
        
        btgoimon.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                jPanel1.setVisible(true);
                btgoimon.setVisible(false);
                btdatban.setVisible(false);
            }
        });
        
    }
   

    /**
     * This method is called from within the constructor to initialize the form.
     * WARNING: Do NOT modify this code. The content of this method is always
     * regenerated by the Form Editor.
     */
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jPanel12 = new javax.swing.JPanel();
        jPanel17 = new javax.swing.JPanel();
        lbban = new javax.swing.JLabel();
        lbtrangthai = new javax.swing.JLabel();
        lbtenban = new javax.swing.JLabel();
        jPanel18 = new javax.swing.JPanel();
        jButton9 = new javax.swing.JButton();
        jLabel11 = new javax.swing.JLabel();
        jButton10 = new javax.swing.JButton();
        jLabel12 = new javax.swing.JLabel();
        jButton11 = new javax.swing.JButton();
        jLabel13 = new javax.swing.JLabel();
        jPanel19 = new javax.swing.JPanel();
        jPanel16 = new javax.swing.JPanel();
        jPanel20 = new javax.swing.JPanel();
        btdatban = new javax.swing.JButton();
        bthuydatban = new javax.swing.JButton();
        btgoimon = new javax.swing.JButton();
        jPanel21 = new javax.swing.JPanel();
        jPanel1 = new javax.swing.JPanel();
        jButton1 = new javax.swing.JButton();
        jButton2 = new javax.swing.JButton();
        jButton3 = new javax.swing.JButton();
        jButton4 = new javax.swing.JButton();
        jButton5 = new javax.swing.JButton();
        jButton6 = new javax.swing.JButton();
        jButton7 = new javax.swing.JButton();
        jButton8 = new javax.swing.JButton();
        jPanel2 = new javax.swing.JPanel();
        jPanel8 = new javax.swing.JPanel();
        btthemmon = new javax.swing.JButton();
        jPanel7 = new javax.swing.JPanel();
        jPanel9 = new javax.swing.JPanel();
        jLabel1 = new javax.swing.JLabel();
        jLabel2 = new javax.swing.JLabel();
        jLabel3 = new javax.swing.JLabel();
        soluong = new javax.swing.JSpinner();
        tftenmon = new javax.swing.JTextField();
        tfgia = new javax.swing.JTextField();
        jLabel7 = new javax.swing.JLabel();
        jPanel10 = new javax.swing.JPanel();
        jScrollPane3 = new javax.swing.JScrollPane();
        tbthucdon = new javax.swing.JTable();
        jPanel3 = new javax.swing.JPanel();
        jPanel6 = new javax.swing.JPanel();
        btthanhtoan = new javax.swing.JButton();
        btthemnon2 = new javax.swing.JButton();
        jPanel11 = new javax.swing.JPanel();
        jPanel13 = new javax.swing.JPanel();
        jPanel4 = new javax.swing.JPanel();
        jLabel4 = new javax.swing.JLabel();
        jLabel9 = new javax.swing.JLabel();
        tftongtien = new javax.swing.JTextField();
        jLabel10 = new javax.swing.JLabel();
        jLabel5 = new javax.swing.JLabel();
        tfsotientra = new javax.swing.JTextField();
        jLabel8 = new javax.swing.JLabel();
        jLabel6 = new javax.swing.JLabel();
        jsgiamgia = new javax.swing.JSpinner();
        jPanel14 = new javax.swing.JPanel();
        jScrollPane1 = new javax.swing.JScrollPane();
        tbmondagoi = new javax.swing.JTable();

        setDefaultCloseOperation(javax.swing.WindowConstants.DISPOSE_ON_CLOSE);
        setBackground(new java.awt.Color(255, 255, 255));
        addWindowListener(new java.awt.event.WindowAdapter() {
            public void windowClosing(java.awt.event.WindowEvent evt) {
                formWindowClosing(evt);
            }
        });

        jPanel12.setPreferredSize(new java.awt.Dimension(300, 980));
        jPanel12.setLayout(new java.awt.BorderLayout());

        jPanel17.setPreferredSize(new java.awt.Dimension(300, 60));

        lbtrangthai.setFont(new java.awt.Font("Cambria", 1, 18)); // NOI18N

        lbtenban.setFont(new java.awt.Font("Cambria", 1, 18)); // NOI18N

        javax.swing.GroupLayout jPanel17Layout = new javax.swing.GroupLayout(jPanel17);
        jPanel17.setLayout(jPanel17Layout);
        jPanel17Layout.setHorizontalGroup(
            jPanel17Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel17Layout.createSequentialGroup()
                .addGroup(jPanel17Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(lbban, javax.swing.GroupLayout.PREFERRED_SIZE, 13, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addGroup(jPanel17Layout.createSequentialGroup()
                        .addContainerGap()
                        .addComponent(lbtenban, javax.swing.GroupLayout.PREFERRED_SIZE, 91, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addGap(53, 53, 53)
                        .addComponent(lbtrangthai, javax.swing.GroupLayout.PREFERRED_SIZE, 125, javax.swing.GroupLayout.PREFERRED_SIZE)))
                .addContainerGap(21, Short.MAX_VALUE))
        );
        jPanel17Layout.setVerticalGroup(
            jPanel17Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jPanel17Layout.createSequentialGroup()
                .addComponent(lbban, javax.swing.GroupLayout.PREFERRED_SIZE, 2, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(18, 18, 18)
                .addGroup(jPanel17Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                    .addComponent(lbtenban, javax.swing.GroupLayout.PREFERRED_SIZE, 29, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(lbtrangthai, javax.swing.GroupLayout.PREFERRED_SIZE, 38, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );

        jPanel17Layout.linkSize(javax.swing.SwingConstants.VERTICAL, new java.awt.Component[] {lbtenban, lbtrangthai});

        jPanel12.add(jPanel17, java.awt.BorderLayout.PAGE_START);

        jPanel18.setPreferredSize(new java.awt.Dimension(300, 60));

        jButton9.setBackground(new java.awt.Color(255, 153, 153));
        jButton9.setForeground(new java.awt.Color(255, 153, 153));

        jLabel11.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        jLabel11.setText("Trống");

        jButton10.setBackground(new java.awt.Color(51, 255, 204));

        jLabel12.setText("Đang phục vụ");

        jButton11.setBackground(new java.awt.Color(255, 255, 0));

        jLabel13.setText("Đã đặt trước");

        javax.swing.GroupLayout jPanel18Layout = new javax.swing.GroupLayout(jPanel18);
        jPanel18.setLayout(jPanel18Layout);
        jPanel18Layout.setHorizontalGroup(
            jPanel18Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel18Layout.createSequentialGroup()
                .addContainerGap()
                .addGroup(jPanel18Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(jPanel18Layout.createSequentialGroup()
                        .addComponent(jButton9)
                        .addGap(20, 20, 20)
                        .addComponent(jLabel11))
                    .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jPanel18Layout.createSequentialGroup()
                        .addComponent(jButton11, javax.swing.GroupLayout.PREFERRED_SIZE, 36, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addGap(8, 8, 8)))
                .addGroup(jPanel18Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(jPanel18Layout.createSequentialGroup()
                        .addGap(32, 32, 32)
                        .addComponent(jButton10)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                        .addComponent(jLabel12))
                    .addComponent(jLabel13))
                .addGap(0, 56, Short.MAX_VALUE))
        );

        jPanel18Layout.linkSize(javax.swing.SwingConstants.HORIZONTAL, new java.awt.Component[] {jButton10, jButton11, jButton9});

        jPanel18Layout.setVerticalGroup(
            jPanel18Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel18Layout.createSequentialGroup()
                .addGroup(jPanel18Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(jButton9, javax.swing.GroupLayout.PREFERRED_SIZE, 22, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addGroup(jPanel18Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                        .addComponent(jLabel11)
                        .addComponent(jButton10, javax.swing.GroupLayout.PREFERRED_SIZE, 23, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addComponent(jLabel12)))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(jPanel18Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                    .addComponent(jLabel13)
                    .addComponent(jButton11, javax.swing.GroupLayout.PREFERRED_SIZE, 22, javax.swing.GroupLayout.PREFERRED_SIZE)))
        );

        jPanel18Layout.linkSize(javax.swing.SwingConstants.VERTICAL, new java.awt.Component[] {jButton10, jButton11, jButton9});

        jPanel12.add(jPanel18, java.awt.BorderLayout.PAGE_END);

        jPanel19.setBorder(javax.swing.BorderFactory.createTitledBorder(null, "Danh sách bàn ăn", javax.swing.border.TitledBorder.CENTER, javax.swing.border.TitledBorder.DEFAULT_POSITION, new java.awt.Font("Cambria", 0, 15))); // NOI18N
        jPanel19.setPreferredSize(new java.awt.Dimension(300, 860));
        jPanel19.setLayout(new java.awt.FlowLayout(java.awt.FlowLayout.LEFT));
        jPanel12.add(jPanel19, java.awt.BorderLayout.CENTER);

        getContentPane().add(jPanel12, java.awt.BorderLayout.LINE_START);

        jPanel16.setPreferredSize(new java.awt.Dimension(980, 980));
        jPanel16.setLayout(new java.awt.BorderLayout());

        jPanel20.setBackground(new java.awt.Color(255, 255, 255));
        jPanel20.setPreferredSize(new java.awt.Dimension(980, 60));

        btdatban.setBackground(new java.awt.Color(51, 255, 102));
        btdatban.setFont(new java.awt.Font("Tahoma", 0, 18)); // NOI18N
        btdatban.setIcon(new javax.swing.ImageIcon(getClass().getResource("/HinhAnh/Phone-icon_1.png"))); // NOI18N
        btdatban.setText("Đặt Bàn");
        btdatban.setPreferredSize(new java.awt.Dimension(200, 50));
        btdatban.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btdatbanActionPerformed(evt);
            }
        });
        jPanel20.add(btdatban);

        bthuydatban.setBackground(new java.awt.Color(255, 102, 102));
        bthuydatban.setFont(new java.awt.Font("Tahoma", 0, 18)); // NOI18N
        bthuydatban.setIcon(new javax.swing.ImageIcon(getClass().getResource("/HinhAnh/stop-icon.png"))); // NOI18N
        bthuydatban.setText("Hủy Đặt Bàn");
        bthuydatban.setPreferredSize(new java.awt.Dimension(200, 50));
        bthuydatban.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                bthuydatbanActionPerformed(evt);
            }
        });
        jPanel20.add(bthuydatban);

        btgoimon.setBackground(new java.awt.Color(102, 204, 255));
        btgoimon.setFont(new java.awt.Font("Tahoma", 0, 18)); // NOI18N
        btgoimon.setIcon(new javax.swing.ImageIcon(getClass().getResource("/HinhAnh/Finance-Purchase-Order-icon (1).png"))); // NOI18N
        btgoimon.setText("Gọi Món");
        btgoimon.setPreferredSize(new java.awt.Dimension(200, 50));
        btgoimon.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btgoimonActionPerformed(evt);
            }
        });
        jPanel20.add(btgoimon);

        jPanel16.add(jPanel20, java.awt.BorderLayout.PAGE_START);

        jPanel21.setBackground(new java.awt.Color(255, 255, 255));
        jPanel21.setPreferredSize(new java.awt.Dimension(980, 920));
        jPanel21.setLayout(new java.awt.BorderLayout());

        jPanel1.setPreferredSize(new java.awt.Dimension(980, 60));

        jButton1.setBackground(new java.awt.Color(102, 102, 255));
        jButton1.setIcon(new javax.swing.ImageIcon(getClass().getResource("/HinhAnh/Mayor-Pizza-icon.png"))); // NOI18N
        jButton1.setText("PIZZA");
        jButton1.setPreferredSize(new java.awt.Dimension(110, 50));
        jButton1.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jButton1ActionPerformed(evt);
            }
        });
        jPanel1.add(jButton1);

        jButton2.setBackground(new java.awt.Color(102, 102, 255));
        jButton2.setIcon(new javax.swing.ImageIcon(getClass().getResource("/HinhAnh/32405-spaghetti-icon.png"))); // NOI18N
        jButton2.setText("PASTA");
        jButton2.setPreferredSize(new java.awt.Dimension(110, 50));
        jButton2.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jButton2ActionPerformed(evt);
            }
        });
        jPanel1.add(jButton2);

        jButton3.setBackground(new java.awt.Color(102, 102, 255));
        jButton3.setFont(new java.awt.Font("Tahoma", 0, 10)); // NOI18N
        jButton3.setIcon(new javax.swing.ImageIcon(getClass().getResource("/HinhAnh/french-fries-icon.png"))); // NOI18N
        jButton3.setText("FAVOURITE");
        jButton3.setHorizontalAlignment(javax.swing.SwingConstants.LEFT);
        jButton3.setHorizontalTextPosition(javax.swing.SwingConstants.RIGHT);
        jButton3.setPreferredSize(new java.awt.Dimension(125, 50));
        jButton3.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jButton3ActionPerformed(evt);
            }
        });
        jPanel1.add(jButton3);

        jButton4.setBackground(new java.awt.Color(102, 102, 255));
        jButton4.setIcon(new javax.swing.ImageIcon(getClass().getResource("/HinhAnh/Salad-icon.png"))); // NOI18N
        jButton4.setText("SALAD");
        jButton4.setPreferredSize(new java.awt.Dimension(110, 50));
        jButton4.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jButton4ActionPerformed(evt);
            }
        });
        jPanel1.add(jButton4);

        jButton5.setBackground(new java.awt.Color(255, 153, 51));
        jButton5.setFont(new java.awt.Font("Tahoma", 0, 10)); // NOI18N
        jButton5.setIcon(new javax.swing.ImageIcon(getClass().getResource("/HinhAnh/Juice-icon.png"))); // NOI18N
        jButton5.setText("SMOOTHIES");
        jButton5.setHorizontalAlignment(javax.swing.SwingConstants.LEFT);
        jButton5.setHorizontalTextPosition(javax.swing.SwingConstants.RIGHT);
        jButton5.setPreferredSize(new java.awt.Dimension(127, 50));
        jButton5.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jButton5ActionPerformed(evt);
            }
        });
        jPanel1.add(jButton5);

        jButton6.setBackground(new java.awt.Color(255, 153, 51));
        jButton6.setIcon(new javax.swing.ImageIcon(getClass().getResource("/HinhAnh/32438-tropical-drink-icon.png"))); // NOI18N
        jButton6.setText("JUICE");
        jButton6.setPreferredSize(new java.awt.Dimension(110, 50));
        jButton6.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jButton6ActionPerformed(evt);
            }
        });
        jPanel1.add(jButton6);

        jButton7.setBackground(new java.awt.Color(255, 153, 51));
        jButton7.setIcon(new javax.swing.ImageIcon(getClass().getResource("/HinhAnh/icecream-4-icon.png"))); // NOI18N
        jButton7.setText("MILK");
        jButton7.setPreferredSize(new java.awt.Dimension(110, 50));
        jButton7.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jButton7ActionPerformed(evt);
            }
        });
        jPanel1.add(jButton7);

        jButton8.setBackground(new java.awt.Color(255, 153, 51));
        jButton8.setFont(new java.awt.Font("Tahoma", 0, 10)); // NOI18N
        jButton8.setIcon(new javax.swing.ImageIcon(getClass().getResource("/HinhAnh/soda-can-icon.png"))); // NOI18N
        jButton8.setText("SOFT DRINK");
        jButton8.setHorizontalAlignment(javax.swing.SwingConstants.LEFT);
        jButton8.setHorizontalTextPosition(javax.swing.SwingConstants.RIGHT);
        jButton8.setPreferredSize(new java.awt.Dimension(127, 50));
        jButton8.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jButton8ActionPerformed(evt);
            }
        });
        jPanel1.add(jButton8);

        jPanel21.add(jPanel1, java.awt.BorderLayout.PAGE_START);

        jPanel2.setPreferredSize(new java.awt.Dimension(490, 860));
        jPanel2.setLayout(new java.awt.BorderLayout());

        jPanel8.setPreferredSize(new java.awt.Dimension(490, 60));

        btthemmon.setBackground(new java.awt.Color(153, 255, 51));
        btthemmon.setIcon(new javax.swing.ImageIcon(getClass().getResource("/HinhAnh/add-icon_1.png"))); // NOI18N
        btthemmon.setText("Thêm Món");
        btthemmon.setPreferredSize(new java.awt.Dimension(200, 50));
        btthemmon.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btthemmonActionPerformed(evt);
            }
        });
        jPanel8.add(btthemmon);

        jPanel2.add(jPanel8, java.awt.BorderLayout.PAGE_END);

        jPanel7.setPreferredSize(new java.awt.Dimension(490, 800));
        jPanel7.setLayout(new java.awt.BorderLayout());

        jPanel9.setPreferredSize(new java.awt.Dimension(490, 150));

        jLabel1.setFont(new java.awt.Font("Cambria", 0, 14)); // NOI18N
        jLabel1.setText("Tên Món");

        jLabel2.setFont(new java.awt.Font("Cambria", 0, 14)); // NOI18N
        jLabel2.setText("Giá");

        jLabel3.setFont(new java.awt.Font("Cambria", 0, 14)); // NOI18N
        jLabel3.setText("Số Lượng");

        soluong.setFont(new java.awt.Font("Tahoma", 0, 16)); // NOI18N
        soluong.setRequestFocusEnabled(false);

        tftenmon.setEditable(false);

        tfgia.setEditable(false);
        tfgia.setFont(new java.awt.Font("Tahoma", 0, 16)); // NOI18N
        tfgia.setText("0");

        jLabel7.setFont(new java.awt.Font("Times New Roman", 1, 15)); // NOI18N
        jLabel7.setText("VND");

        javax.swing.GroupLayout jPanel9Layout = new javax.swing.GroupLayout(jPanel9);
        jPanel9.setLayout(jPanel9Layout);
        jPanel9Layout.setHorizontalGroup(
            jPanel9Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel9Layout.createSequentialGroup()
                .addContainerGap()
                .addGroup(jPanel9Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(jLabel1)
                    .addComponent(jLabel2)
                    .addComponent(jLabel3))
                .addGap(144, 144, 144)
                .addGroup(jPanel9Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                    .addComponent(soluong, javax.swing.GroupLayout.PREFERRED_SIZE, 66, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(tftenmon, javax.swing.GroupLayout.PREFERRED_SIZE, 183, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addGroup(jPanel9Layout.createSequentialGroup()
                        .addComponent(tfgia, javax.swing.GroupLayout.PREFERRED_SIZE, 137, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addComponent(jLabel7, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)))
                .addContainerGap(96, Short.MAX_VALUE))
        );
        jPanel9Layout.setVerticalGroup(
            jPanel9Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel9Layout.createSequentialGroup()
                .addContainerGap()
                .addGroup(jPanel9Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(jLabel1)
                    .addComponent(tftenmon, javax.swing.GroupLayout.DEFAULT_SIZE, 25, Short.MAX_VALUE))
                .addGap(18, 18, 18)
                .addGroup(jPanel9Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(jLabel2)
                    .addGroup(jPanel9Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                        .addComponent(tfgia, javax.swing.GroupLayout.PREFERRED_SIZE, 25, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addComponent(jLabel7, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, 27, Short.MAX_VALUE)
                .addGroup(jPanel9Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel3)
                    .addComponent(soluong, javax.swing.GroupLayout.PREFERRED_SIZE, 25, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(19, 19, 19))
        );

        jPanel9Layout.linkSize(javax.swing.SwingConstants.VERTICAL, new java.awt.Component[] {tfgia, tftenmon});

        jPanel7.add(jPanel9, java.awt.BorderLayout.PAGE_END);

        jPanel10.setBorder(javax.swing.BorderFactory.createTitledBorder(null, "Thực đơn", javax.swing.border.TitledBorder.CENTER, javax.swing.border.TitledBorder.DEFAULT_POSITION, new java.awt.Font("Cambria", 1, 15))); // NOI18N
        jPanel10.setPreferredSize(new java.awt.Dimension(490, 650));

        tbthucdon.setBackground(new java.awt.Color(255, 255, 204));
        tbthucdon.setModel(new javax.swing.table.DefaultTableModel(
            new Object [][] {

            },
            new String [] {
                "Mã Món", "Tên Món", "Giá"
            }
        ));
        tbthucdon.setPreferredSize(new java.awt.Dimension(300, 600));
        tbthucdon.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                tbthucdonMouseClicked(evt);
            }
        });
        jScrollPane3.setViewportView(tbthucdon);

        javax.swing.GroupLayout jPanel10Layout = new javax.swing.GroupLayout(jPanel10);
        jPanel10.setLayout(jPanel10Layout);
        jPanel10Layout.setHorizontalGroup(
            jPanel10Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel10Layout.createSequentialGroup()
                .addComponent(jScrollPane3, javax.swing.GroupLayout.DEFAULT_SIZE, 468, Short.MAX_VALUE)
                .addContainerGap())
        );
        jPanel10Layout.setVerticalGroup(
            jPanel10Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel10Layout.createSequentialGroup()
                .addContainerGap()
                .addComponent(jScrollPane3, javax.swing.GroupLayout.DEFAULT_SIZE, 600, Short.MAX_VALUE)
                .addContainerGap())
        );

        jPanel7.add(jPanel10, java.awt.BorderLayout.CENTER);

        jPanel2.add(jPanel7, java.awt.BorderLayout.CENTER);

        jPanel21.add(jPanel2, java.awt.BorderLayout.LINE_START);

        jPanel3.setPreferredSize(new java.awt.Dimension(490, 860));
        jPanel3.setLayout(new java.awt.BorderLayout());

        jPanel6.setPreferredSize(new java.awt.Dimension(490, 60));

        btthanhtoan.setBackground(new java.awt.Color(102, 102, 255));
        btthanhtoan.setIcon(new javax.swing.ImageIcon(getClass().getResource("/HinhAnh/script-yellow-icon.png"))); // NOI18N
        btthanhtoan.setText("Thanh Toán");
        btthanhtoan.setPreferredSize(new java.awt.Dimension(200, 50));
        btthanhtoan.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btthanhtoanActionPerformed(evt);
            }
        });
        jPanel6.add(btthanhtoan);

        btthemnon2.setBackground(new java.awt.Color(153, 255, 51));
        btthemnon2.setIcon(new javax.swing.ImageIcon(getClass().getResource("/HinhAnh/add-icon_1.png"))); // NOI18N
        btthemnon2.setText("Thêm Món");
        btthemnon2.setPreferredSize(new java.awt.Dimension(200, 50));
        btthemnon2.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btthemnon2ActionPerformed(evt);
            }
        });
        jPanel6.add(btthemnon2);

        jPanel3.add(jPanel6, java.awt.BorderLayout.PAGE_END);

        jPanel11.setLayout(new java.awt.BorderLayout());

        jPanel13.setPreferredSize(new java.awt.Dimension(490, 150));

        jLabel4.setFont(new java.awt.Font("Tahoma", 0, 14)); // NOI18N
        jLabel4.setText("Tổng Tiền");

        jLabel9.setFont(new java.awt.Font("Times New Roman", 1, 15)); // NOI18N
        jLabel9.setText("%");

        tftongtien.setEditable(false);
        tftongtien.setFont(new java.awt.Font("Tahoma", 0, 16)); // NOI18N
        tftongtien.setHorizontalAlignment(javax.swing.JTextField.RIGHT);
        tftongtien.setText("0");

        jLabel10.setFont(new java.awt.Font("Times New Roman", 1, 15)); // NOI18N
        jLabel10.setText("VND");

        jLabel5.setFont(new java.awt.Font("Tahoma", 0, 14)); // NOI18N
        jLabel5.setText("Giảm Giá");

        tfsotientra.setEditable(false);
        tfsotientra.setFont(new java.awt.Font("Tahoma", 0, 16)); // NOI18N
        tfsotientra.setHorizontalAlignment(javax.swing.JTextField.RIGHT);
        tfsotientra.setText("0");

        jLabel8.setFont(new java.awt.Font("Times New Roman", 1, 15)); // NOI18N
        jLabel8.setText("VND");

        jLabel6.setFont(new java.awt.Font("Tahoma", 0, 14)); // NOI18N
        jLabel6.setText("Số Tiền Phải Trả");

        jsgiamgia.setFont(new java.awt.Font("Tahoma", 0, 16)); // NOI18N

        javax.swing.GroupLayout jPanel4Layout = new javax.swing.GroupLayout(jPanel4);
        jPanel4.setLayout(jPanel4Layout);
        jPanel4Layout.setHorizontalGroup(
            jPanel4Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel4Layout.createSequentialGroup()
                .addContainerGap()
                .addGroup(jPanel4Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(jLabel5)
                    .addComponent(jLabel4, javax.swing.GroupLayout.PREFERRED_SIZE, 106, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jLabel6))
                .addGap(105, 105, 105)
                .addGroup(jPanel4Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                    .addComponent(tftongtien, javax.swing.GroupLayout.Alignment.TRAILING)
                    .addComponent(jsgiamgia, javax.swing.GroupLayout.Alignment.TRAILING)
                    .addComponent(tfsotientra, javax.swing.GroupLayout.Alignment.TRAILING, javax.swing.GroupLayout.PREFERRED_SIZE, 123, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGroup(jPanel4Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(jPanel4Layout.createSequentialGroup()
                        .addGap(18, 18, 18)
                        .addGroup(jPanel4Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addComponent(jLabel8, javax.swing.GroupLayout.PREFERRED_SIZE, 45, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(jLabel10)))
                    .addGroup(jPanel4Layout.createSequentialGroup()
                        .addGap(4, 4, 4)
                        .addComponent(jLabel9)))
                .addContainerGap())
        );

        jPanel4Layout.linkSize(javax.swing.SwingConstants.HORIZONTAL, new java.awt.Component[] {jLabel10, jLabel8, jLabel9});

        jPanel4Layout.setVerticalGroup(
            jPanel4Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel4Layout.createSequentialGroup()
                .addContainerGap()
                .addGroup(jPanel4Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                    .addGroup(jPanel4Layout.createSequentialGroup()
                        .addGap(0, 0, Short.MAX_VALUE)
                        .addGroup(jPanel4Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(tfsotientra, javax.swing.GroupLayout.PREFERRED_SIZE, 25, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(jLabel6)))
                    .addGroup(jPanel4Layout.createSequentialGroup()
                        .addGroup(jPanel4Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addGroup(jPanel4Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                                .addComponent(tftongtien, javax.swing.GroupLayout.PREFERRED_SIZE, 25, Short.MAX_VALUE)
                                .addComponent(jLabel4, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
                            .addComponent(jLabel8, javax.swing.GroupLayout.Alignment.TRAILING, javax.swing.GroupLayout.PREFERRED_SIZE, 25, javax.swing.GroupLayout.PREFERRED_SIZE))
                        .addGap(18, 18, 18)
                        .addGroup(jPanel4Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(jsgiamgia, javax.swing.GroupLayout.PREFERRED_SIZE, 25, Short.MAX_VALUE)
                            .addComponent(jLabel9, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                            .addComponent(jLabel5))
                        .addGap(21, 21, 21)
                        .addComponent(jLabel10)))
                .addContainerGap())
        );

        jPanel4Layout.linkSize(javax.swing.SwingConstants.VERTICAL, new java.awt.Component[] {jsgiamgia, tfsotientra, tftongtien});

        jPanel4Layout.linkSize(javax.swing.SwingConstants.VERTICAL, new java.awt.Component[] {jLabel10, jLabel8, jLabel9});

        jPanel13.add(jPanel4);

        jPanel11.add(jPanel13, java.awt.BorderLayout.PAGE_END);

        jPanel14.setBorder(javax.swing.BorderFactory.createTitledBorder(null, "Món đã gọi", javax.swing.border.TitledBorder.CENTER, javax.swing.border.TitledBorder.DEFAULT_POSITION, new java.awt.Font("Cambria", 1, 15))); // NOI18N
        jPanel14.setPreferredSize(new java.awt.Dimension(490, 650));

        jScrollPane1.setBorder(null);

        tbmondagoi.setBackground(new java.awt.Color(255, 255, 204));
        tbmondagoi.setModel(new javax.swing.table.DefaultTableModel(
            new Object [][] {

            },
            new String [] {

            }
        ));
        tbmondagoi.setPreferredSize(new java.awt.Dimension(300, 590));
        tbmondagoi.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                tbmondagoiMouseClicked(evt);
            }
        });
        jScrollPane1.setViewportView(tbmondagoi);

        javax.swing.GroupLayout jPanel14Layout = new javax.swing.GroupLayout(jPanel14);
        jPanel14.setLayout(jPanel14Layout);
        jPanel14Layout.setHorizontalGroup(
            jPanel14Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addComponent(jScrollPane1, javax.swing.GroupLayout.Alignment.TRAILING, javax.swing.GroupLayout.DEFAULT_SIZE, 478, Short.MAX_VALUE)
        );
        jPanel14Layout.setVerticalGroup(
            jPanel14Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel14Layout.createSequentialGroup()
                .addContainerGap()
                .addComponent(jScrollPane1, javax.swing.GroupLayout.DEFAULT_SIZE, 591, Short.MAX_VALUE)
                .addGap(20, 20, 20))
        );

        jPanel11.add(jPanel14, java.awt.BorderLayout.CENTER);

        jPanel3.add(jPanel11, java.awt.BorderLayout.CENTER);

        jPanel21.add(jPanel3, java.awt.BorderLayout.CENTER);

        jPanel16.add(jPanel21, java.awt.BorderLayout.CENTER);

        getContentPane().add(jPanel16, java.awt.BorderLayout.CENTER);

        pack();
    }// </editor-fold>//GEN-END:initComponents
    
    
    private void jButton1ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jButton1ActionPerformed
        jPanel2.setVisible(true);
        btthemnon2.setVisible(false);
        thucDonDAL.loadThucDonTheoTenLoai(tbthucdon, "PIZZA");
    }//GEN-LAST:event_jButton1ActionPerformed
    public float tongTien(){
        int rowsCount = tbmondagoi.getRowCount();
        float sum =0;
        for (int i = 0; i < rowsCount; i++) {
            sum = sum + Float.parseFloat(tbmondagoi.getValueAt(i, 4).toString());
            
        }
        return sum;
    }
    public float soTienThucTe(){
        int giamgia = (int) jsgiamgia.getValue();
        float giamgia2 = (float) giamgia/100;
        tt = tongTien() - tongTien()*giamgia2;
        return tt;
    }
    private void jButton2ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jButton2ActionPerformed
        jPanel2.setVisible(true);
        thucDonDAL.loadThucDonTheoTenLoai(tbthucdon, "PASTA");
         
    }//GEN-LAST:event_jButton2ActionPerformed

    private void jButton3ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jButton3ActionPerformed
        jPanel2.setVisible(true);
        thucDonDAL.loadThucDonTheoTenLoai(tbthucdon, "FAVOURITE");
    }//GEN-LAST:event_jButton3ActionPerformed

    private void jButton4ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jButton4ActionPerformed
        jPanel2.setVisible(true);
        thucDonDAL.loadThucDonTheoTenLoai(tbthucdon, "SALAD");   
        jPanel10.setVisible(true);
    }//GEN-LAST:event_jButton4ActionPerformed

    private void jButton5ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jButton5ActionPerformed
        jPanel2.setVisible(true);
        thucDonDAL.loadThucDonTheoTenLoai(tbthucdon, "SMOOTHIES");  
        jPanel10.setVisible(true);
       
    }//GEN-LAST:event_jButton5ActionPerformed

    private void jButton6ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jButton6ActionPerformed
        jPanel2.setVisible(true);
        thucDonDAL.loadThucDonTheoTenLoai(tbthucdon, "JUICE");        
        jPanel10.setVisible(true);
    }//GEN-LAST:event_jButton6ActionPerformed

    private void jButton7ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jButton7ActionPerformed
        jPanel2.setVisible(true);
        thucDonDAL.loadThucDonTheoTenLoai(tbthucdon, "MILK SHAKE");       
        jPanel10.setVisible(true);
    }//GEN-LAST:event_jButton7ActionPerformed

    private void jButton8ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jButton8ActionPerformed
        jPanel2.setVisible(true);
        thucDonDAL.loadThucDonTheoTenLoai(tbthucdon, "SOFT DRINK");   
        jPanel10.setVisible(true);
    }//GEN-LAST:event_jButton8ActionPerformed

    private void tbthucdonMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_tbthucdonMouseClicked
        jPanel9.setVisible(true);
        jPanel8.setVisible(true);
        try{
            if(tbthucdon.getSelectedRow() == -1) JOptionPane.showMessageDialog(null, "Hãy chọn món muốn thêm trước!");
            
            
            else{
                int i = tbthucdon.getSelectedRow();
                DefaultTableModel tableModel = (DefaultTableModel) tbthucdon.getModel();
                tftenmon.setText(tableModel.getValueAt(i, 1).toString());
                tfgia.setText(tableModel.getValueAt(i, 2).toString());
            }
        }catch(HeadlessException ex){
        }
    }//GEN-LAST:event_tbthucdonMouseClicked

    private void btthemnon2ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btthemnon2ActionPerformed
        jPanel1.setVisible(true);
    }//GEN-LAST:event_btthemnon2ActionPerformed

    private void btthemmonActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btthemmonActionPerformed
        
        if(tftenmon.getText().equals("") || tfgia.getText().equals("")) JOptionPane.showMessageDialog(null, "Hãy chọn món muốn thêm!");
        else{
            jPanel3.setVisible(true);
            btthemnon2.setVisible(false);
            float a = Float.parseFloat(tfgia.getText());
            int b = (int) soluong.getValue();
            c = a*b;
            int maBan = Integer.parseInt(lbban.getText());
            DefaultTableModel model = (DefaultTableModel) tbthucdon.getModel();
            int maMon = Integer.parseInt(model.getValueAt(tbthucdon.getSelectedRow(), 0).toString());
                  
            hoaDonBLL.themMon(maBan, maMon, b, tenDN);
            hoaDonDAL.getHoaDonList(maBan, tbmondagoi);
            tftongtien.setText(String.valueOf(tongTien()));
            tfsotientra.setText(String.valueOf(soTienThucTe()));
            tftenmon.setText("");
            tfgia.setText("");
            soluong.setValue(1);
            loadButtonBan();
            jPanel20.setVisible(false);
            jPanel12.setVisible(false);
            jPanel12.setVisible(true);
            
        }
        
    }//GEN-LAST:event_btthemmonActionPerformed

    private void tbmondagoiMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_tbmondagoiMouseClicked
        DefaultTableModel model = (DefaultTableModel) tbmondagoi.getModel();
        
        
        if(tbmondagoi.getSelectedRow()==-1)
      {
  
            JOptionPane.showMessageDialog(null, "Chọn món ăn cần xóa");
      }
        else{
            
            
            int maMon = Integer.parseInt(model.getValueAt(tbmondagoi.getSelectedRow(), 0).toString());
            
            int xn = JOptionPane.showConfirmDialog(null, "Bạn muốn xóa món vừa chọn?", "Xóa", JOptionPane.YES_NO_OPTION);
            if(xn == JOptionPane.YES_OPTION){
                model.removeRow(tbmondagoi.getSelectedRow());
                hoaDonBLL.xoaMon(maMon, Integer.parseInt(lbban.getText()), tbmondagoi);
                hoaDonDAL.getHoaDonList(Integer.parseInt(lbban.getText()), tbmondagoi);
                tftenmon.setText("");
                tftongtien.setText(String.valueOf(tongTien()));
                tfsotientra.setText(String.valueOf(soTienThucTe()));
            }
            
        }
          
           
    }//GEN-LAST:event_tbmondagoiMouseClicked

    private void btthanhtoanActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btthanhtoanActionPerformed
        int xn = JOptionPane.showConfirmDialog(null, "Thanh toán cho bàn "+lbban.getText()+"?\n Tổng tiền = "+tftongtien.getText()+" VND"
                +"\n Giảm giá = "+jsgiamgia.getValue()+"%\n Số tiền phải trả = "+tfsotientra.getText()+" VND", "Thanh toán", JOptionPane.YES_NO_OPTION);
        if(xn == JOptionPane.YES_OPTION){
            
            thanhToan();
            
            
            
        }
    }//GEN-LAST:event_btthanhtoanActionPerformed

    private void btdatbanActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btdatbanActionPerformed
        hoaDonBLL.capNhatTrangThaiBan(Integer.parseInt(lbban.getText()), "Đã đặt trước");
        btdatban.setVisible(false);
        bthuydatban.setVisible(true);
        loadButtonBan();
        jPanel12.setVisible(false);
        jPanel12.setVisible(true);
    }//GEN-LAST:event_btdatbanActionPerformed

    private void bthuydatbanActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_bthuydatbanActionPerformed
        
        hoaDonBLL.capNhatTrangThaiBan(Integer.parseInt(lbban.getText()), "Trống");
        bthuydatban.setVisible(false);
        btgoimon.setVisible(true);
        btdatban.setVisible(true);
        jPanel1.setVisible(false);
        loadButtonBan();
        jPanel12.setVisible(false);
        jPanel12.setVisible(true);
    }//GEN-LAST:event_bthuydatbanActionPerformed

    private void btgoimonActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btgoimonActionPerformed

        jPanel1.setVisible(true);
        
    }//GEN-LAST:event_btgoimonActionPerformed

    private void formWindowClosing(java.awt.event.WindowEvent evt) {//GEN-FIRST:event_formWindowClosing
        int k = JOptionPane.showConfirmDialog(null, "Thoát?", "Xác nhận?", JOptionPane.YES_NO_OPTION);
        if(k == JOptionPane.YES_OPTION){
            this.setDefaultCloseOperation(DISPOSE_ON_CLOSE);
        }
        else{
            this.setDefaultCloseOperation(DO_NOTHING_ON_CLOSE);
        }
    }//GEN-LAST:event_formWindowClosing
    
   public void thanhToan(){
       
        try {
                hoaDonDAL.inHD(Integer.parseInt(lbban.getText()));
                jTextArea.append("\n\n");
                jTextArea.append("\t\tTổng Tiền   =   "+tftongtien.getText()+" VND\n");
                jTextArea.append("\t\tGiảm giá   =   "+jsgiamgia.getValue()+"%\n");
                jTextArea.append("\t\tSố tiền cần thanh toán   =   "+tfsotientra.getText()+" VND");
                jTextArea.print();
            } catch (PrinterException ex) {
                Logger.getLogger(OrderGUI.class.getName()).log(Level.SEVERE, null, ex);
            }
        hoaDonBLL.thanhToan(Float.parseFloat(tfsotientra.getText()), ((int) jsgiamgia.getValue()), Integer.parseInt(lbban.getText()), tbmondagoi);
        hoaDonBLL.capNhatTrangThaiBan(Integer.parseInt(lbban.getText()), "Trống");
        tftongtien.setText("");
        tfsotientra.setText("");
        loadButtonBan();
        jPanel12.setVisible(false);
        jPanel12.setVisible(true);
            
        jPanel20.setVisible(true);
        jPanel1.setVisible(false);
        jPanel2.setVisible(false);
        jPanel3.setVisible(false);
        btdatban.setVisible(true);
        bthuydatban.setVisible(false);
        btgoimon.setVisible(true);
        
        
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
            java.util.logging.Logger.getLogger(OrderGUI.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(OrderGUI.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(OrderGUI.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(OrderGUI.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>

        /* Create and display the form */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                //new Order2().setVisible(true);
                OrderGUI order2 = new OrderGUI();
                order2.chay();
            }
        });
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton btdatban;
    private javax.swing.JButton btgoimon;
    private javax.swing.JButton bthuydatban;
    private javax.swing.JButton btthanhtoan;
    private javax.swing.JButton btthemmon;
    private javax.swing.JButton btthemnon2;
    private javax.swing.JButton jButton1;
    private javax.swing.JButton jButton10;
    private javax.swing.JButton jButton11;
    private javax.swing.JButton jButton2;
    private javax.swing.JButton jButton3;
    private javax.swing.JButton jButton4;
    private javax.swing.JButton jButton5;
    private javax.swing.JButton jButton6;
    private javax.swing.JButton jButton7;
    private javax.swing.JButton jButton8;
    private javax.swing.JButton jButton9;
    private javax.swing.JLabel jLabel1;
    private javax.swing.JLabel jLabel10;
    private javax.swing.JLabel jLabel11;
    private javax.swing.JLabel jLabel12;
    private javax.swing.JLabel jLabel13;
    private javax.swing.JLabel jLabel2;
    private javax.swing.JLabel jLabel3;
    private javax.swing.JLabel jLabel4;
    private javax.swing.JLabel jLabel5;
    private javax.swing.JLabel jLabel6;
    private javax.swing.JLabel jLabel7;
    private javax.swing.JLabel jLabel8;
    private javax.swing.JLabel jLabel9;
    private javax.swing.JPanel jPanel1;
    private javax.swing.JPanel jPanel10;
    private javax.swing.JPanel jPanel11;
    private javax.swing.JPanel jPanel12;
    private javax.swing.JPanel jPanel13;
    private javax.swing.JPanel jPanel14;
    private javax.swing.JPanel jPanel16;
    private javax.swing.JPanel jPanel17;
    private javax.swing.JPanel jPanel18;
    private javax.swing.JPanel jPanel19;
    private javax.swing.JPanel jPanel2;
    private javax.swing.JPanel jPanel20;
    private javax.swing.JPanel jPanel21;
    private javax.swing.JPanel jPanel3;
    private javax.swing.JPanel jPanel4;
    private javax.swing.JPanel jPanel6;
    private javax.swing.JPanel jPanel7;
    private javax.swing.JPanel jPanel8;
    private javax.swing.JPanel jPanel9;
    private javax.swing.JScrollPane jScrollPane1;
    private javax.swing.JScrollPane jScrollPane3;
    private javax.swing.JSpinner jsgiamgia;
    private javax.swing.JLabel lbban;
    private javax.swing.JLabel lbtenban;
    private javax.swing.JLabel lbtrangthai;
    private javax.swing.JSpinner soluong;
    private javax.swing.JTable tbmondagoi;
    private javax.swing.JTable tbthucdon;
    private javax.swing.JTextField tfgia;
    private javax.swing.JTextField tfsotientra;
    private javax.swing.JTextField tftenmon;
    private javax.swing.JTextField tftongtien;
    // End of variables declaration//GEN-END:variables
}

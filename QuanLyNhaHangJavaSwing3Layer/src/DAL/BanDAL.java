/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package DAL;

import DTO.BanDTO;
import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.Statement;
import java.util.ArrayList;

/**
 *
 * @author Hoang
 */
public class BanDAL {
    KetNoiDB kn = new KetNoiDB();
    public ArrayList<BanDTO> getTableList(){
        
        ArrayList<BanDTO> tableList= new ArrayList<>();
        String query = "SELECT * FROM  BAN ";
        Connection connection = kn.connection();
        Statement st;
        ResultSet rs;
       
       try {
           st = connection.createStatement();
           rs = st.executeQuery(query);

           

           while(rs.next())
           {
                BanDTO table = new BanDTO(rs.getInt(1), rs.getString(2), rs.getString(3));
                tableList.add(table);
                
           }

       } 
      catch (Exception e) {
           e.printStackTrace();
       }
        
        return tableList;
    }
    
    
}

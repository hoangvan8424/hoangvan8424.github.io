/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package DAL;

import java.sql.Connection;
import java.sql.DriverManager;

/**
 *
 * @author Hoang
 */
public class KetNoiDB {

    public Connection connection(){
        
        Connection conn;
        try{
            String uRL="jdbc:sqlserver://Localhost:1433;databaseName=QLNH_TH";
            String user = "sa";
            String password = "123";
            Class.forName("com.microsoft.sqlserver.jdbc.SQLServerDriver");
            conn=DriverManager.getConnection(uRL, user, password);
            return conn;
        }catch(Exception ex){
            ex.printStackTrace();
            return null;
        }
    }
    
}

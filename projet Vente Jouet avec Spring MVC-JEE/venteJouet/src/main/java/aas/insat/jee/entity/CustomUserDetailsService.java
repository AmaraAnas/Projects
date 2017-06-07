package aas.insat.jee.entity;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.dao.DataAccessException;
import org.springframework.security.core.userdetails.UserDetailsService;
import org.springframework.security.core.userdetails.UsernameNotFoundException;

import aas.insat.jee.dao.BoutiqueDAO;

public class CustomUserDetailsService implements UserDetailsService {

    @Autowired
    private BoutiqueDAO userDAO;

    public CustomUserDetail loadUserByUsername(String name) throws UsernameNotFoundException, DataAccessException {
        // returns the get(0) of the user list obtained from the db
        User domainUser = userDAO.getUser(name);

        CustomUserDetail customUserDetail=new CustomUserDetail();
        customUserDetail.setUser(domainUser);
     
        return customUserDetail;

    }



}

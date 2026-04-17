package com.example.demo;

import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RestController;
import java.util.HashMap;
@RestController
public class HelloController {
    HashMap<String, String> userDB = new HashMap<>();

    @PostMapping("/login")
    public String check_user_info(@RequestBody User user) {
        if (userDB.containsKey(user.getName())) {
            if (check_user(user)) {
                return "success to login";
            } else {
                return "invalid password";
            }
        }
        else {
            add_user(user);
            return "success to add new user";
        }
    }
    public boolean check_user(User user) {
        if (userDB.get(user.name).equals(user.password)) {
            return true;
        }
        return false;
    }
    public void add_user(User user) {
        userDB.put(user.name, user.password);
    }
}
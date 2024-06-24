//
//  ViewController.swift
//  loginAndRegistration
//
//  Created by Ali Koç on 4.05.2024.
//

import UIKit
import CoreData

class ViewController: UIViewController {

    
    @IBOutlet weak var image: UIImageView!
    
    
    @IBOutlet weak var usernameText: UITextField!
    
    @IBOutlet weak var passwordText: UITextField!
    
    
    override func viewDidLoad() {
        super.viewDidLoad()
        // Do any additional setup after loading the view.
        
        passwordText.isSecureTextEntry = true
    }
    
    func showAlert(title: String, message: String) {
        let alert = UIAlertController(title: title, message: message, preferredStyle: .alert)
        alert.addAction(UIAlertAction(title: "Tamam", style: .default, handler: nil))
        present(alert, animated: true, completion: nil)
    }
    
    
    @IBAction func loginButton(_ sender: Any) {
        guard let username = usernameText.text, !username.isEmpty else {
             showAlert(title: "Uyarı", message: "Kullanıcı adı boş olamaz")
             return
         }
        
        guard let password = passwordText.text, !password.isEmpty else {
               showAlert(title: "Uyarı", message: "Şifre boş olamaz")
               return
           }
        
        let managedContext = (UIApplication.shared.delegate as! AppDelegate).persistentContainer.viewContext
            let fetchRequest = NSFetchRequest<RegistrationEntities>(entityName: "RegistrationEntities")
            fetchRequest.predicate = NSPredicate(format: "username == %@", username)

            do {
                let users = try managedContext.fetch(fetchRequest)
                if let user = users.first, user.password == password {
                    // Kullanıcı bulundu ve şifre doğru, giriş yap
                    // İstenen sayfaya geçiş yapabilirsiniz
                    print("Giriş başarılı!")
                    performSegue(withIdentifier: "loginToNext", sender: self)
                } else {
                    showAlert(title: "Uyarı", message: "Kullanıcı adı veya şifre yanlış")
                }
            } catch {
                print("Veritabanından kullanıcıları getirirken hata oluştu: \(error.localizedDescription)")
            }
        
        
                                                                                              
                                                                                              
    }
    

    @IBAction func registerButton(_ sender: Any) {
        performSegue(withIdentifier: "registerToNext", sender: self)

    }
    
}


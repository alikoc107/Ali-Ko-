//
//  registerToNext.swift
//  loginAndRegistration
//
//  Created by Ali Koç on 4.05.2024.
//

import UIKit
import CoreData


class registerToNext: UIViewController {
    @IBOutlet weak var usernameText: UITextField!
    @IBOutlet weak var passwordText: UITextField!
    @IBOutlet weak var passwordAgainText: UITextField!
    
    @IBOutlet weak var image: UIImageView!
    
    @IBOutlet weak var welcomeLabel: UILabel!
    
    
    override func viewDidLoad() {
        super.viewDidLoad()
        
        // Do any additional setup after loading the view.
        
        welcomeLabel.text = "Welcome e-charge system"
        passwordText.isSecureTextEntry = true
        passwordAgainText.isSecureTextEntry = true
    }
    func showAlert(title: String, message: String, completion: ((UIAlertAction) -> Void)? = nil) {
        let alert = UIAlertController(title: title, message: message, preferredStyle: .alert)
        alert.addAction(UIAlertAction(title: "Tamam", style: .default, handler: completion))
        present(alert, animated: true, completion: nil)
    }
    
    
    @IBAction func registerAndLoginButton(_ sender: Any) {
        guard let username = usernameText.text, !username.isEmpty else {
            showAlert(title: "Hata", message: "Kullanıcı adı boş olamaz")
            return
        }
        
        guard let password = passwordText.text, !password.isEmpty else {
            showAlert(title: "Hata", message: "Şifre boş olamaz")
            return
        }
        
        guard let passwordAgain = passwordAgainText.text, !passwordAgain.isEmpty else {
            showAlert(title: "Hata", message: "Şifreyi tekrar girin")
            return
        }
        
        guard password == passwordAgain else {
            showAlert(title: "Hata", message: "Şifreler eşleşmiyor")
            return
        }
        
        let appDelegate = UIApplication.shared.delegate as! AppDelegate
        let context = appDelegate.persistentContainer.viewContext
        
        let newUser = NSEntityDescription.insertNewObject(forEntityName: "RegistrationEntities", into: context)
        
        newUser.setValue(username, forKey: "username")
        newUser.setValue(password, forKey: "password")
        newUser.setValue(UUID(), forKey: "id")
        
        do {
            try context.save()
            showAlert(title: "Başarılı", message: "Kayıt başarıyla tamamlandı.") { _ in
                self.performSegue(withIdentifier: "registerToLogin", sender: nil)
            }
        } catch {
            print("Hata:", error.localizedDescription)
            showAlert(title: "Hata", message: "Kayıt başarısız oldu.")
        }
        
        
        
        
    }
}

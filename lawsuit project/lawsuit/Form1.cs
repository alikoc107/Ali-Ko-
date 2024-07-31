using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Data.SqlClient;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace lawsuit
{
    public partial class Form1 : Form
    {
        SqlConnection con;
        SqlCommand com;
        SqlDataReader dr;
        public Form1()
        {
            InitializeComponent();
        }

        SqlConnection baglanti = new SqlConnection("Data Source = localhost; Initial Catalog = lawsuit; Integrated Security = True");
        private void button1_Click(object sender, EventArgs e)
        {

            try
            {
                baglanti.Open();
                string sql = "SELECT *From newuser where UserName=@user AND Password=@pass";
                SqlParameter prm1 = new SqlParameter("user", textBox1.Text.Trim());
                SqlParameter prm2 = new SqlParameter("pass", textBox2.Text.Trim());
                SqlCommand komut = new SqlCommand(sql, baglanti);
                komut.Parameters.Add(prm1);
                komut.Parameters.Add(prm2);
                DataTable dt = new DataTable();
                SqlDataAdapter da = new SqlDataAdapter(komut);
                da.Fill(dt);

                if (dt.Rows.Count > 0)
                {
                    this.Hide();
                    Form2 form2 = new Form2();
                    form2.ShowDialog();
                    this.Close();




                }
            }
            catch (Exception)
            {
                MessageBox.Show("Your Credentials Are Not Correnct. Please Try Again");
            }
        }

        private void checkBox1_CheckedChanged(object sender, EventArgs e)
        {
            if(checkBox1.CheckState == CheckState.Checked)
            {
                textBox2.UseSystemPasswordChar = true;
                checkBox1.Text = "Hide Password";
            }

            else if (checkBox1.CheckState == CheckState.Unchecked)
            {
                textBox2.UseSystemPasswordChar = false;
                checkBox1.Text = "Show Password";

            }
        }

        private void button2_Click(object sender, EventArgs e)
        {
            String username = textBox3.Text;
            String password = textBox4.Text;

            
            SqlCommand komut = new SqlCommand("INSERT INTO newuser(UserName, Password) VALUES ('" +username + "', '" + password +"')" , baglanti);
            baglanti.Open();
            komut.ExecuteNonQuery();
            baglanti.Close();

            this.Hide();
            Form2 form2 = new Form2();
            form2.ShowDialog();
            this.Close();
            
            
            

        }

        private void checkBox2_CheckedChanged(object sender, EventArgs e)
        {
            if (checkBox2.CheckState == CheckState.Checked)
            {
                textBox4.UseSystemPasswordChar = true;
                checkBox2.Text = "Hide Password";
            }

            else if (checkBox2.CheckState == CheckState.Unchecked)
            {
                textBox4.UseSystemPasswordChar = false;
                checkBox2.Text = "Show Password";

            }
        }
    }
}

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
    public partial class Form2 : Form
    {
        public Form2()
        {
            InitializeComponent();
        }

        private void label6_Click(object sender, EventArgs e)
        {

        }


        SqlConnection baglanti = new SqlConnection("Data Source =localhost; Initial Catalog =lawsuit; Integrated Security=True");
        private void button1_Click(object sender, EventArgs e)
        {   //ADD
            String lawsuitNo = textBox1.Text;
            String DefendentName = textBox2.Text;
            String DefendentSurname = textBox3.Text;
            String DefendentID = textBox4.Text;
            String DefendentGender = "";
            String PlaintiffName = textBox6.Text;
            String PlaintiffSurname = textBox7.Text;
            String PlaintiffID = textBox8.Text;
            String PlaintiffGender = "";
            String JudgeNo = textBox10.Text;
            String Courthouse = comboBox3.Text;

            if (radioButton1.Checked)
            {
                DefendentGender = radioButton1.Text;
            }

           else  if (radioButton2.Checked)
            {
                DefendentGender = radioButton2.Text;
            }

            if (radioButton3.Checked)
            {
                PlaintiffGender = radioButton3.Text;
            }

            else if (radioButton4.Checked)
            {
                PlaintiffGender = radioButton4.Text;
            }

            baglanti.Open();
            SqlCommand komut = new SqlCommand("INSERT INTO lawsuit(LawsuitNo, DefendentName, DefendentSurname, DefendentID, DefendentGender, PlaintiffName, PlaintiffSurname, PlaintiffID, PlaintiffGender, JudgeNo, Courthouse ) VALUES ('" + lawsuitNo+ "', '" +DefendentName+ "', '" +DefendentSurname+ "', '" +DefendentID+ "', '" + DefendentGender+ "', '" +PlaintiffName+ "', '" +PlaintiffSurname+ "', '" +PlaintiffID+ "', '" +PlaintiffGender+ "', '" +JudgeNo+ "' , '" + Courthouse + "' )", baglanti);

            komut.ExecuteNonQuery();
            baglanti.Close();
            list();
        }

        private void Form2_Load(object sender, EventArgs e)
        {
            list();
            
        }

        public void clear() 
        {
            textBox1.Text = "";
            textBox2.Text = "";
            textBox3.Text = "";
            textBox4.Text = "";
            groupBox2.Text = "";
            textBox6.Text = "";
            textBox7.Text = "";
            textBox8.Text = "";
            groupBox3.Text = "";
            textBox10.Text = "";
            comboBox3.Text = "";

        }
        private void list()
        {
            baglanti.Open();
            SqlDataAdapter da = new SqlDataAdapter("Select *from lawsuit",baglanti);
            DataTable tablo = new DataTable();
            da.Fill(tablo);
            dataGridView1.DataSource = tablo;
            baglanti.Close();
        }

        private void dataGridView1_CellContentClick(object sender, DataGridViewCellEventArgs e)
        {
            textBox1.Text = dataGridView1.CurrentRow.Cells[0].Value.ToString();
            textBox2.Text = dataGridView1.CurrentRow.Cells[1].Value.ToString();
            textBox3.Text = dataGridView1.CurrentRow.Cells[2].Value.ToString();
            textBox4.Text = dataGridView1.CurrentRow.Cells[3].Value.ToString();
            groupBox2.Text = dataGridView1.CurrentRow.Cells[4].Value.ToString();
            textBox6.Text = dataGridView1.CurrentRow.Cells[5].Value.ToString();
            textBox7.Text = dataGridView1.CurrentRow.Cells[6].Value.ToString();
            textBox8.Text = dataGridView1.CurrentRow.Cells[7].Value.ToString();
            groupBox3.Text = dataGridView1.CurrentRow.Cells[8].Value.ToString();
            textBox10.Text = dataGridView1.CurrentRow.Cells[9].Value.ToString();
            comboBox3.Text = dataGridView1.CurrentRow.Cells[10].Value.ToString();
        }

        private void button2_Click(object sender, EventArgs e)
        {//DELETE
            String lawsuitNo = textBox1.Text;
            baglanti.Open();
            SqlCommand komut = new SqlCommand("DELETE FROM lawsuit WHERE LawsuitNo=('"+lawsuitNo+"')", baglanti);
            komut.ExecuteNonQuery();
            baglanti.Close();
            list();
        }

        private void button3_Click(object sender, EventArgs e)
        {//UPDATE

            String lawsuitNo = textBox1.Text;
            String DefendentName = textBox2.Text;
            String DefendentSurname = textBox3.Text;
            String DefendentID = textBox4.Text;
            String DefendentGender = "";
            String PlaintiffName = textBox6.Text;
            String PlaintiffSurname = textBox7.Text;
            String PlaintiffID = textBox8.Text;
            String PlaintiffGender = "";
            String JudgeNo = textBox10.Text;
            String Courthouse = comboBox3.Text;

            if (radioButton1.Checked)
            {
                DefendentGender = radioButton1.Text;
            }

            else if (radioButton2.Checked)
            {
                DefendentGender = radioButton2.Text;
            }

            if (radioButton3.Checked)
            {
                PlaintiffGender = radioButton3.Text;
            }

            else if (radioButton4.Checked)
            {
                PlaintiffGender = radioButton4.Text;
            }



            baglanti.Open();
            SqlCommand komut = new SqlCommand("UPDATE lawsuit SET LawsuitNo='"+lawsuitNo+"', DefendentName='"+DefendentName+ "', DefendentSurname='" +DefendentSurname+ "', DefendentID='" +DefendentID+ "', DefendentGender='" +DefendentGender+ "', PlaintiffName='" +PlaintiffName+ "', PlaintiffSurname='" +PlaintiffSurname+ "', PlaintiffID='" +PlaintiffID+ "', PlaintiffGender='" + PlaintiffGender + "', JudgeNo='" +JudgeNo  +"', Courthouse='" + Courthouse + "' WHERE LawsuitNo='" +lawsuitNo+ "'   ", baglanti);
            komut.ExecuteNonQuery();
            baglanti.Close();
            list();
        }

        private void button4_Click(object sender, EventArgs e)
        {
            clear();
        }

        private void textBox5_TextChanged(object sender, EventArgs e)
        { //SEARCH
            String keyword = textBox5.Text;
            baglanti.Open();
            SqlDataAdapter sa = new SqlDataAdapter("SELECT *from lawsuit WHERE DefendentName LIKE '%" + keyword + "%'OR PlaintiffName LIKE '%" + keyword + "%'", baglanti);
            DataTable dt = new DataTable();
            sa.Fill(dt);
            dataGridView1.DataSource = dt;
            baglanti.Close();
        }
    }
}

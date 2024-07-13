using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.Net.NetworkInformation;
using System.IO;
using System.Threading;
using System.Net;
using System.Timers;


namespace WindowsFormsApp1
{
    public partial class Form1 : Form
    {
        DataTable pingTable = new DataTable();
        List<string> ipAddress = new List<string>();
        List<PictureBox> pictureboxList= new List<PictureBox>();
        private System.Timers.Timer timer;

        public Form1()
        {
            InitializeComponent();

            timer = new System.Timers.Timer();
            timer.Interval = 1000;//Repeat the ping every 10 seconds
            timer.Enabled = true;
            timer.Elapsed += timer_Elapsed;
        }

        private void timer_Elapsed(object sender, ElapsedEventArgs e)
        {
            backgroundWorker1.RunWorkerAsync();
        }

        private void FillPingTable()
        {
            pingTable.Columns.Add("ip",typeof(string));
            pingTable.Columns.Add("picturebox", typeof(string));

            pingTable.Rows.Add();

            for(int i = 0; i< ipAddress.Count; i++) {
                pingTable.Rows.Add(ipAddress[i] , pictureboxList[i]);
            }

        }
        private void Form1_Load(object sender, EventArgs e)
        {
            using (var reader = new StreamReader(@"D:\Project\HAL\C#\WindowsFormsApp1\IpAddress.csv"))
            {
                while (!reader.EndOfStream)
                {
                    var line = reader.ReadLine();
                    var values = line.Split('\n');

                    ipAddress.Add(values[0]);
                }

                for(int i = 1; i<= 5; i++)
                {
                    pictureboxList.Add((PictureBox)Controls.Find("PictureBox" + i, true)[0]);
                }

                FillPingTable();

                backgroundWorker1.RunWorkerAsync();
            }

        }

        private void label1_Click(object sender, EventArgs e)
        {

        }

        private void backgroundWorker1_DoWork(object sender, DoWorkEventArgs e)
        {
            Thread.Sleep(200);
            Parallel.For (0, ipAddress.Count(), (i, loopState) =>
            {
                Ping ping = new Ping();
                PingReply pingreply = ping.Send(ipAddress[i].ToString());
                this.BeginInvoke((Action)delegate ()
                {
                    pictureboxList[i].SizeMode = PictureBoxSizeMode.Zoom;
                    pictureboxList[i].BackColor = (pingreply.Status == IPStatus.Success) ? Color.Green : Color.Red;
                });
            }) ;
        }
    }
}

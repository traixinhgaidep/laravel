using Models.EF;
using System;
using System.Collections.Generic;
using System.Data.SqlClient;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Models
{
    public class ArticleModel
    {
        private BaoDienTuDBContext context = null;
        public ArticleModel()
        {
            context = new BaoDienTuDBContext();
        }

        public List<Article> ListAll()
        {
            var list = context.Database.SqlQuery<Article>("Sp_Article_ListAll").ToList();
            return list;
        }

        public int Create(string title, int? idChannel, string image, string content, string author)
        {
            object[] parameters = 
            {
                new SqlParameter("@Title", title),
                new SqlParameter("@IDChannel", idChannel),
                new SqlParameter("@Image", image),
                new SqlParameter("@Content", content),
                new SqlParameter("@Author", author)
            };
            int res = context.Database.ExecuteSqlCommand("Sp_Article_Insert @Title,@IDChannel,@Image,@Content,@Author", parameters);
            return res;
        }
    }
}

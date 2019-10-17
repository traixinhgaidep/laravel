using Models.EF;
using System;
using System.Collections.Generic;
using System.Data.SqlClient;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Models
{
    public class AccountModel
    {
        private BaoDienTuDBContext context = null;
        public AccountModel()
        {
            context = new BaoDienTuDBContext();
        }

        public bool Login(string email, string password)
        {
            object[] sqlParams =
            {
                new SqlParameter("Email", email),
                new SqlParameter("Password", password)
            };
            var res = context.Database.SqlQuery<bool>("SP_Account_Login @Email,@Password", sqlParams).SingleOrDefault();
            return res;
        }
    }
}

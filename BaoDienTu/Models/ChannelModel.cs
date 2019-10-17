using Models.EF;
using System;
using System.Collections.Generic;
using System.Data.SqlClient;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Models
{
    public class ChannelModel
    {
        private BaoDienTuDBContext context = null;
        public ChannelModel()
        {
            context = new BaoDienTuDBContext();
        }

        public List<Channel> ListAll()
        {
            var list = context.Database.SqlQuery<Channel>("Sp_Channel_ListAll").ToList();
            return list;
        }

        public int Create(string name, int? count)
        {
            object[] parameters =
            {
                new SqlParameter("@Name",name),
                new SqlParameter("@Count",count),

            };
            int res = context.Database.ExecuteSqlCommand("Sp_Channel_Insert @Name, @Count", parameters);
            return res;
        }

        public int Edit(int? idChannel, string name, int? count)
        {
            object[] parameters =
            {
                new SqlParameter("@IDChannel",idChannel),
                new SqlParameter("@Name",name),
                new SqlParameter("@Count",count),

            };
            int res = context.Database.ExecuteSqlCommand("Sp_Channel_Update @IDChannel,@Name, @Count", parameters);
            return res;
        }

        /// <summary>
        /// Get Channel Information by Channel ID
        /// </summary>
        /// <param name="idChannel"></param>
        /// <returns></returns>
        public Channel findByID(int? idChannel)
        {
            Channel Ret = new Channel();

            var sqlParameter = new SqlParameter("@IDChannel", idChannel);
            var listChannel = context.Database.SqlQuery<Channel>("Sp_Channel_Find_By_ID @IDChannel", sqlParameter).ToList();
            
            // There is a result
            if(listChannel.Count > 0)
            {
                Ret = listChannel[0];
            }

            return Ret;
        }

        public bool Delete(int? idChannel)
        {
            try
            {
                var channel = context.Channels.Find(idChannel);
                context.Channels.Remove(channel);
                context.SaveChanges();
                return true;
            }
            catch(Exception e)
            {
                return false;
            }
        }
    }
}

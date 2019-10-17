namespace Models.EF
{
    using System;
    using System.Collections.Generic;
    using System.ComponentModel.DataAnnotations;
    using System.ComponentModel.DataAnnotations.Schema;
    using System.Data.Entity.Spatial;

    [Table("Article")]
    public partial class Article
    {
        [Key]
        public int IDArticle { get; set; }

        [StringLength(200)]
        public string Title { get; set; }

        public int? IDChannel { get; set; }

        [StringLength(100)]
        public string Image { get; set; }

        [StringLength(1000)]
        public string Content { get; set; }

        [StringLength(20)]
        public string Author { get; set; }

        public DateTime? Date { get; set; }
    }
}

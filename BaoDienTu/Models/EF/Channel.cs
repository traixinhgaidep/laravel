namespace Models.EF
{
    using System;
    using System.Collections.Generic;
    using System.ComponentModel;
    using System.ComponentModel.DataAnnotations;
    using System.ComponentModel.DataAnnotations.Schema;
    using System.Data.Entity.Spatial;

    [Table("Channel")]
    public partial class Channel
    {
        [Key]
        public int IDChannel { get; set; }

        [StringLength(15, ErrorMessage = "So ki tu toi da la 15")]
        [DisplayName("Ten danh muc")]
        [Required(ErrorMessage = "Ban chua nhap ten danh muc")]        
        public string Name { get; set; }

        //[Range(0, Int32.MaxValue, ErrorMessage = "Ban phai nhap so.")]
        [DisplayName("So luong bai viet")]
        public int? Count { get; set; }
    }
}

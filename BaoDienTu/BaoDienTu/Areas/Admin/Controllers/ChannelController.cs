using Models;
using Models.EF;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace BaoDienTu.Areas.Admin.Controllers
{
    public class ChannelController : Controller
    {
        // GET: Admin/Channel
        public ActionResult Index()
        {
            var iplChannel = new ChannelModel();
            var model = iplChannel.ListAll();
            return View(model);
        }

        // GET: Admin/Channel/Details/5
        public ActionResult Details(int id)
        {
            return View();
        }

        [HttpGet]
        // GET: Admin/Channel/Create
        public ActionResult Create()
        {
            return View();
        }

        // POST: Admin/Channel/Create
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Create(Channel collection)
        {
            try
            {
                if (ModelState.IsValid)
                {
                    var model = new ChannelModel();
                    int res = model.Create(collection.Name, collection.Count);
                    if(res > 0)
                    {
                        return RedirectToAction("Index","Channel");
                    }
                }
                else
                {
                    ModelState.AddModelError("", "Them moi khong thanh cong");
                }
                return View(collection);
            }
            catch
            {
                return View();
            }
        }

        // GET: Admin/Channel/Edit/5
        [HttpGet]
        public ActionResult Edit(int id)
        {
            var iplChannel = new ChannelModel();
            var channelInfo = iplChannel.findByID(id);
            return View(channelInfo);
        }

        // POST: Admin/Channel/Edit/5
        [HttpPost]
        public ActionResult Edit(int id, Channel collection)
        {
            if (ModelState.IsValid)
            {
                var model = new ChannelModel();
                int res = model.Edit(collection.IDChannel, collection.Name, collection.Count);
                if (res > 0)
                {
                    return RedirectToAction("Index", "Channel");
                }
            }
            else
            {
                ModelState.AddModelError("", "Sua khong thanh cong");
            }
            return View(collection);
        }

        [HttpDelete]
        public ActionResult Delete(int id)
        {
            new ChannelModel().Delete(id);
            return RedirectToAction("Index", "Channel");
        }

    }
}

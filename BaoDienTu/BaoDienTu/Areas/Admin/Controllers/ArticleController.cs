using Models;
using Models.EF;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace BaoDienTu.Areas.Admin.Controllers
{
    public class ArticleController : Controller
    {
        // GET: Admin/Article
        public ActionResult Index()
        {
            var iplArticle = new ArticleModel();
            var model = iplArticle.ListAll();
            return View(model);
        }

        // GET: Admin/Article/Details/5
        public ActionResult Details(int id)
        {
            return View();
        }

        // GET: Admin/Article/Create
        public ActionResult Create()
        {
            return View();
        }

        // POST: Admin/Article/Create
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Create(Article collection)
        {
            try
            {
                if (ModelState.IsValid)
                {
                    var model = new ArticleModel();
                    int res = model.Create(collection.Title, collection.IDChannel, collection.Image, collection.Content, collection.Author);
                    if(res > 0)
                    {
                        return RedirectToAction("Index", "Article");
                    }
                }
                else
                {
                    ModelState.AddModelError("", "Them bao khong thanh cong");
                }
                return View(collection);
            }
            catch
            {
                return View();
            }
        }

        // GET: Admin/Article/Edit/5
        public ActionResult Edit(int id)
        {
            return View();
        }

        // POST: Admin/Article/Edit/5
        [HttpPost]
        public ActionResult Edit(int id, FormCollection collection)
        {
            try
            {
                // TODO: Add update logic here

                return RedirectToAction("Index");
            }
            catch
            {
                return View();
            }
        }

        // GET: Admin/Article/Delete/5
        public ActionResult Delete(int id)
        {
            return View();
        }

        // POST: Admin/Article/Delete/5
        [HttpPost]
        public ActionResult Delete(int id, FormCollection collection)
        {
            try
            {
                // TODO: Add delete logic here

                return RedirectToAction("Index");
            }
            catch
            {
                return View();
            }
        }
    }
}

<?php
    $actives = [
        "catActive" => isset($_GET['cat']) ? $_GET['cat'] : "PHTML5",
        "subActive" => isset($_GET['sub']) ? $_GET['sub'] : "Home"
    ];
    $categories = [
        ["name" => "HTML Games", "link" => "PHTML5", "path" => "M9.808 12.971l.076-1.064.927-.529A11.644 11.644 0 0 0 13.243 9.5c2.64-2.641 3.446-5.746 2.475-6.718-.972-.97-4.077-.166-6.718 2.475-.76.76-1.397 1.59-1.878 2.432l-.53.927-1.063.076a3.973 3.973 0 0 0-2.355.988 10.984 10.984 0 0 1 3.351 2.295c.98.98 1.752 2.117 2.295 3.351a3.973 3.973 0 0 0 .988-2.355zM6.835 15.8a6.687 6.687 0 0 1-.663.771C5 17.743 3.232 18.096.868 17.631c-.464-2.363-.11-4.131 1.06-5.303.248-.246.506-.468.772-.663a8.975 8.975 0 0 0-2.598-.81 5.974 5.974 0 0 1 1.473-2.416 5.977 5.977 0 0 1 3.81-1.741 13.637 13.637 0 0 1 2.2-2.855c3.32-3.32 7.594-4.427 9.547-2.475 1.952 1.953.844 6.227-2.475 9.546a13.637 13.637 0 0 1-2.855 2.2 5.977 5.977 0 0 1-1.741 3.81 5.955 5.955 0 0 1-2.416 1.474 8.975 8.975 0 0 0-.81-2.598zM5.11 13.39a2.6 2.6 0 0 0-.54-.415c-.432.15-.94.48-1.405.944-.219.22-.487.959-.49 1.905.946-.003 1.688-.274 1.905-.49.465-.466.795-.973.944-1.405a2.6 2.6 0 0 0-.414-.54zm7.778-7.78a1 1 0 1 1 1.414-1.413A1 1 0 0 1 12.89 5.61z"],
        ["name" => "Movies", "link" => "movies", "path" => "M6 15v3h8v-7H6v4zm-2-2v-2H2V9h2V7H2v6h2zm0 2H2v1a2 2 0 0 0 2 2v-3zm14-2V7h-2v2h2v2h-2v2h2zm0 2h-2v3a2 2 0 0 0 2-2v-1zm-4-8V2H6v7h8V7zm4-2V4a2 2 0 0 0-2-2v3h2zM4 5V2a2 2 0 0 0-2 2v1h2zm0-5h12a4 4 0 0 1 4 4v12a4 4 0 0 1-4 4H4a4 4 0 0 1-4-4V4a4 4 0 0 1 4-4z"]
    ];

    class SubMenu{
        public $categories = ["PHTML5" => 14];

        function getSubId($sql, $sub){
            $sanitizeSub = filter_var($sub, FILTER_SANITIZE_SPECIAL_CHARS);
            $querySub = "SELECT id FROM cms.sub_categories WHERE sub_category = ?";
            $stmtSub = $sql->stmt_init();
            $stmtSub->prepare($querySub);
            $stmtSub->bind_param("s", $sanitizeSub);
            $stmtSub->execute();
            $stmtSub->store_result();
            $stmtSub->num_rows();
            $stmtSub->bind_result($id);
            $stmtSub->fetch();
            $stmtSub->close();
            return $id;
        }

        function getSubCategories($sql, $cat) {

            $querySub = "SELECT id, category_id, sub_category FROM cms.sub_categories WHERE category_id = ?";
            $stmtSub = $sql->stmt_init();
            $stmtSub->prepare($querySub);
            $stmtSub->bind_param("i", $this->categories[$cat]);
            $stmtSub->execute();
            $stmtSub->store_result();
            $stmtSub->num_rows();

            $stmtSub->bind_result($id, $category_id, $sub_category);

            $data = [];

            while($stmtSub->fetch()){
                array_push($data, ["id" => $id, "category_id" => $category_id, "sub_category" => $sub_category]);
            }

            $stmtSub->close();
            return $data;
        }
    }

    class Contents{
        public $categories = ["PHTML5" => 14];

        function getContents($sql, $catId, $subId){
            $sanitizeSub = filter_var($subId, FILTER_SANITIZE_NUMBER_INT);
            $queryContent = "SELECT id, title, content_file_name, icon_file_name, description FROM cms.portal_content WHERE category_id = ? and sub_category_id = ?";
            $stmtContent = $sql->stmt_init();
            $stmtContent->prepare($queryContent);
            $stmtContent->bind_param("ii", $this->categories[$catId], $sanitizeSub);
            $stmtContent->execute();
            $stmtContent->store_result();
            $stmtContent->num_rows();

            $stmtContent->bind_result($id, $title, $filename, $icon, $description);

            $data = [];

            echo $id;

            while($stmtContent->fetch()){
                $querySub = "SELECT id, sub_category FROM cms.sub_categories WHERE id = ?";
                $stmtSub = $sql->stmt_init();
                $stmtSub->prepare($querySub);
                $stmtSub->bind_param("i", $sanitizeSub);
                $stmtSub->execute();
                $stmtSub->store_result();
                $stmtSub->num_rows();

                $stmtSub->bind_result($id, $sub_category);

                $stmtSub->fetch();

                array_push($data, ["id" => $id, "title" => $title, "filename" => $filename, "icon" => $icon, "description" => $description, "category" => $this->categories[$catId], 'subcategory' => $sub_category]);
            }


            $stmtContent->close();
            return $data;
        }
    }
?>
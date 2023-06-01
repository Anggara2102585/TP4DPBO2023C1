<?php

class ClubView {
    public function render($data) {
        $addTitle = "Club";
        $addForm = '<form action="index.php" method="POST">
            <div class="mb-3">
                <label for="clubName" class="form-label">Club Name</label>
                <input type="text" class="form-control" id="clubName" name="club_name" required>
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary" name="add_club">Add Club</button>
            </div>
        </form>';

        $tableTitle = "Clubs";
        $tableHeader = '<tr>
            <th>#</th>
            <th>Club Name</th>
            <th class="w-25">Actions</th>
        </tr>';
        $tableBody = null;
        $no = 1;
        foreach ($data['club'] as $val) {
            list($id, $nama_club) = $val;
            $tableBody .= '<tr>
                <td>'.$no++.'</td>
                <div class="normal-mode">
                    <td class="normal-mode main-value">'.$nama_club.'</td>
                    <td class="normal-mode">
                        <button type="button" class="btn btn-sm btn-primary edit-btn">Edit</button>
                        <a href="index.php?delete='.$id.'" class="btn btn-sm btn-danger delete-btn">Delete</a>
                    </td>
                </div>
                <div class="edit-mode">
                    <form class="edit-mode" action="index.php" method="POST">
                        <input type="hidden" class="form-control" name="id_club" value="'.$id.'">
                        <td class="edit-mode">
                            <input type="text" class="form-control" name="club_name" value="'.$nama_club.'" required>
                        </td>
                        <td class="edit-mode">
                            <button type="submit" class="btn btn-sm btn-success save-btn" name="edit_club">Save</button>
                            <button type="button" class="btn btn-sm btn-secondary cancel-btn">Cancel</button>
                        </td>
                    </form>
                </div>
            </tr>';
        }

        $template = new Template("templates/club.html");

        $template->replace("DATA_ADD_TITLE", $addTitle);
        $template->replace("DATA_ADD_FORM", $addForm);
        $template->replace("DATA_TABLE_TITLE", $tableTitle);
        $template->replace("DATA_TABLE_HEADER", $tableHeader);
        $template->replace("DATA_TABLE_BODY", $tableBody);
        $template->write();
    }
}

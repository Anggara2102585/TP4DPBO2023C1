<?php

class MemberView {
    public function renderTable($data) {
        $tableTitle = "Members";
        $tableHeader = '<tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Club</th>
            <th>Join Date</th>
            <th>Actions</th>
        </tr>';
        $tableBody = null;
        $no = 1;
        foreach ($data['member'] as $val) {
            list($id, $name, $email, $phone, $join_date, $id_club) = $val;
            $club_name = $val['club_name'];
            $tableBody .= '<tr>
                <td>'.$no++.'</td>
                <td class="main-value">'.$name.'</td>
                <td>'.$email.'</td>
                <td>'.$phone.'</td>
                <td>'.$club_name.'</td>
                <td>'.$join_date.'</td>
                <td>
                    <a href="member.php?edit='.$id.'" class="btn btn-sm btn-primary edit-btn">Edit</a>
                    <a href="member.php?delete='.$id.'" class="btn btn-sm btn-danger delete-btn">Delete</a>
                </td>
            </tr>';
        }

        $template = new Template("templates/member.html");

        $template->replace("DATA_TABLE_TITLE", $tableTitle);
        $template->replace("DATA_TABLE_HEADER", $tableHeader);
        $template->replace("DATA_TABLE_BODY", $tableBody);
        $template->write();
    }

    public function renderEdit($data) {
        list($id, $name, $email, $phone, $join_date, $id_club) = $data['member'];
        $club_name = $data['member']['club_name'];
        $formTitle = "Edit Member";
        $formContent = '<form action="member.php" method="POST">
            <input type="hidden" class="form-control" name="id" value="'.$id.'" required>
            <label class="form-label">Name</label>
            <input type="text" class="form-control mb-3" name="name" value="'.$name.'" required>
            <label class="form-label">Email</label>
            <input type="email" class="form-control mb-3" name="email" value="'.$email.'" required>
            <label class="form-label">Phone</label>
            <input type="tel" class="form-control mb-3" name="phone" value="'.$phone.'" required>
            <label class="form-label">Club</label>
            <select class="form-select mb-3" name="id_club" required>
                <option value="'.$id_club.'" selected>'.$club_name.'</option>';
                foreach ($data['club'] as $val) {
                    list($val_id, $val_name) = $val;
                    if ($val_id != $id_club) {
                        $formContent .= '<option value="'.$val_id.'">'.$val_name.'</option>';
                    }
                }
            $formContent .= '</select>
            <label class="form-label">Join Date</label>
            <input type="date" class="form-control mb-3" name="join_date" value="'.$join_date.'" required>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary" name="edit_member">Save</button>
            </div>
        </form>';

        $template = new Template("templates/form_member.html");

        $template->replace("DATA_FORM_TITLE", $formTitle);
        $template->replace("DATA_FORM_CONTENT", $formContent);
        $template->write();
    }

    public function renderAdd($data) {
        $formTitle = "Add New Member";
        $formContent = '<form action="member.php" method="POST">
            <label class="form-label">Name</label>
            <input type="text" class="form-control mb-3" name="name" required>
            <label class="form-label">Email</label>
            <input type="email" class="form-control mb-3" name="email" required>
            <label class="form-label">Phone</label>
            <input type="tel" class="form-control mb-3" name="phone" required>
            <label class="form-label">Club</label>
            <select class="form-select mb-3" name="id_club" required>
                <option disabled hidden selected>Select the club</option>';
                foreach ($data['club'] as $val) {
                    list($val_id, $val_name) = $val;
                    $formContent .= '<option value="'.$val_id.'">'.$val_name.'</option>';
                }
            $formContent .= '</select>
            <label class="form-label">Join Date</label>
            <input type="date" class="form-control mb-3" name="join_date" required>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary" name="add_member">Add Member</button>
            </div>
        </form>';

        $template = new Template("templates/form_member.html");

        $template->replace("DATA_FORM_TITLE", $formTitle);
        $template->replace("DATA_FORM_CONTENT", $formContent);
        $template->write();
    }
}

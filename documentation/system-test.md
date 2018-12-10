# System test

This document describes the flow that needs to be supported. This is useful when making changes to the tool. If we can verify that the steps works as intended, then the change was made without any regressions.

- Log in ✓
- Log out ✓
- Change password ✓
- Log in ✓
- Create new artist ✓
  - Test data
    - Kelvin Day
    - 01.01.1982
    - Male
    - Barstreet 1
    - 41375100
    - stecraslab@mybx.site
    - https://kelvin.day.no
    - Contact me any time
- Verify that user has been created with the supplied data ✓
- Edit artist biography
  - Lorem ipsum dolor sit amet, ex sed mediocrem consulatu, minimum nominati pri cu. An vel suas purto, ea eos impetus nostrum dissentiet. An dicit oratio usu, pri ut dicit affert, in alterum periculis has. Percipitur consectetuer pro cu, sit ne amet definitiones. Id nonumy numquam eum, malorum fastidii oportere ea eos, ne vis adipisci interesset reprehendunt.
- Verify that biography has been updated ✓
- Click “Artist login” ✓
- Enable “Artist can update info” ✓
- Click “Send invitation” ✓
- Go to temporary email, accept and use password `ev!14DP&05@&` ✓
- Verify that user is logged in ✓
- Log out ✓
- Log in as your own user ✓
- From Home page, search for “Kelvin” and verify that “Kelvin Day” shows up ✓
- From http://localhost/site/index.php/access/index, verify that “Kelvin Day” is under “Artist” ✓
- From http://localhost/resourcespace7/pages/team/team_user.php?order_by=u.username&group=0&find=K, verify that:

  - “Kelvin Day” shows up ✓
  - “Kelvin Day” is assigned to group “Artist” ✓

- Go to http://localhost/site/
- Create new art (movie)
  - Use title “Karsten og Petra på skattejakt”
  - Use alternative title “Karsten og Petra skal på skattejakt”
  - Set type to “Video”
  - Set artist to “Kelvin Day”
  - Set year to “2016”
  - Set length to “01:02:03
  - Set production country to “Norway”
- Click “Artwork info”
- Verify that all data are set (artist is not shown on this page)
- Click “Arist / credits”
- Verify that “Kelvin Day” shows up
- Click “Edit”
- Add “Jadine Gunn” as producer
- Click “Save”
- Verify that “Jadine Gunn” is set as producer
- Click “Files”
  - Click “Add file
  - Choose a file to upload, and click “Upload the file”
- Verify that placeholder image on the right shows “Processing Resource …”

# CT519-MyHobbies
 สอบปลายภาค Cloud Computing
# http://https://13.229.51.99
# CT519

### หลักการออกแบบ 
แยกระบบออกเป็นหน้าบ้านและหลังบ้าน โดยใช้หน้าบ้านเป็น html+css
และหลังบ้านเป็น php และฐานข้อมูลเป็น mariadb
และใช้ cloud Aws docker แบ่งเป็น frontend และ backend แยก container กัน
ส่วน cloud ที่ใช้ deploy นั้นจะเป็น aws ec2 

### สถาปัตยกรรม 
arm64 

### topology ของระบบ 
1.frontend(html+css) connects to backend(php) method Post and get
2.backend connects to mariadb 
3.each container connects to each other by docker network

### การออกแบบฐานข้อมูล 
ใช้ mariadb สร้าง database hobbies and create table list
column id / ชื่อ / อีเมล / งานอดิเรก
โดยแต่ละแบบจะมีการเก็บ data type ต่างกันไป เช่น ชื่อ / อีเมล / งานอดิเรก จะเก็บเป็น STRING

### การอธิบายส่วนของ code ที่สำคัญ  
จะเป็นด้านการทำระบบหลังบ้าน <br />
โดยเว็บจะมี 4 หน้า แยกองค์ประกอบเป็น <br />
connection.php <br />
navbar.php <br />
footer.php <br />
*-------------* 

### การเตรียมการระบบ Cloud 
เป็นการใช้ ec2 โดยใช้ aws linux ในการทำ และ install docker environment รวมถึง git เพืื่อ clone data มาเพื่อ deploy 

version: '3' # เป็นการระบุว่าเราจะใช้ Compose file เวอร์ชั่นไหน 
services: # เป็นการระบุ container ที่จะต้องใช้ มี 2 container คือ web and db
  web:
    build: #สั่งให้ใช้ image ที่สร้างจาก Dockerfile
      context: ./myweb #path ไปที่ folder myweb
      dockerfile: Dockerfile # เรียกใช้ Dockerfile
    container_name: myweb # กำหนดชื่อ container
    ports:
      - "80:80" #map port 80 จาก ec2 ไป 80 docker
    volumes:
      - ./myweb:/var/www/html  #สร้างพื้นที่การทำงานโดยให้ myweb ทำงานที่ /var/www/html

  db: #เป็นการระบุ container ที่จะต้องใช้ container คือ db
    image: mariadb:10.4 #สั่งให้ใช้ image ที่ชื่อ mariadb:10.4
    container_name: mariadb #ตั้งชื่อ container ว่า mariadb
    environment: # ตั้งค่าสภาพแวดล้อม 
      MYSQL_ROOT_PASSWORD: '' # กำหนด superuser คือ'' (ค่าว่าง)
      MYSQL_DATABASE: detail_hobbies # กำหนด database name คือ detail_hobbies
      MYSQL_USER: root # กำหนด database uses คือ root
      MYSQL_PASSWORD: '' # กำหนด database password คือ '' (ค่าว่าง)
    volumes:
      - ./mysql:/docker-entrypoint-initdb.d # กำหนดให้ใช้สภาพแวดล้อมใน folder mysql โดยมี sql create table and insert data
    ports:
      - "340306:4306" #map port 80 จาก ec2 ไป 80 docker
volumes:
  db_data: 

การ deploy ตัว code มาทำงาน<br />
1.สร้างเว็บและ sql ให้เรียบร้อย พร้อมทั้ง dockerfile และ docker-compose.yaml
2.เตรียม git ให้พร้อม<br />
3.สร้าง repositories CT519-65130126
4.อัพโหลด 1 ขึ้น repositories CT519-65130126
5.ใน Aws install docker engine ให้เรียบร้อย
6.ใน Aws install docker compose ให้เรียบร้อย
7.ใน command line git clone https://github.com/Pich83/CT519-65130126
8.cd CT519-65130126
9.chmod -R 777 all file and folder
10.docker-compose up --build
*--------------------*
กรณีทำผิดพลาดให้กลับไปแก้
1.sudo docker stop $(sudo docker ps -aq)
2.sudo docker rm $(sudo docker ps -aq)
3.ไปขั้นตอนที่ 7-11 ใหม่<br />
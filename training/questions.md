# Câu hỏi phỏng vấn về Lập trình Hướng Đối Tượng (OOP)

1. Lập trình hướng đối tượng là gì? Hãy giải thích các khái niệm cơ bản như class, object, encapsulation, inheritance, polymorphism, abstraction.
   - Lập trình hướng đối tượng là lập trình theo dạng đối tượng sẽ bao gồm các object và có các tính chất như Polymorphism, Encapsulation, Inheritance, Abstraction.
   - Polymorphism: là tính chồng chất nó cho phép các methods có trùng tên nhưng khác paramter được truyền vào thì vẫn có thể sử dụng được.
   - Encapsulation: Tính đóng gói sẽ bao gồm các Access Modifier như public sẽ cho phép thuộc tính hoặc phương thức đó được sử dụng ở bất cứ đâu. Private sẽ chỉ được sử dụng ở trong class đó. Protected sẽ được sử dụng ở trong các class liên quan tới nó thường sẽ được sử dụng ở trong các trường hợp sử dụng tính chất kế thừa.
   - Inheritance: tính kế thừa cho phép các lớp con có thể kế thừa được các thuộc tính và methods của lớp cha mà không cần phải ghi lại
   - Abstraction: tính trừu tượng nó sẽ giống như một bảng hợp đồng khi ở trong lớp trừu tượng đề ra các phương thức hoặc biến nào thì các lớp mở rộng theo lớp trừu tượng này sẽ phải đáp ứng theo nó.
2. Sự khác biệt giữa class và object là gì?
   - Class bao gồm thuộc tính và các phương thức
   - Object là sau khi được gọi để khởi tạo từ Class
3. Tính đóng gói (encapsulation) là gì? Tại sao nó quan trọng?
   - Tính đóng gói quan trọng vì từng acccess modifiers sẽ ảnh hưởng khác nhau. Thường khi thực hiện một app thì các thuộc tính sẽ được để là private hoặc là protected để bảo toàn được không bị bên ngoài làm ảnh hưởng điều này rất quan trọng đến bảo mật ở trong lập trình OOP
4. Hãy giải thích về tính kế thừa (inheritance) và cho ví dụ thực tế.
   - Tính kế thừa cho phép các lớp con có thể kế thừa được các thuộc tính và các method của lớp cha mà không cần phải ghi lại từ đầu
   - Ví dụ: Khởi tạo một lớp User có thuộc tính là name, age, email. Đây là lớp chung của User sau đó khởi tạo một lớp con extends từ class User ra và chỉ ghi thêm thuộc tính như là gender thì các thuộc tính từ name, age,email sẽ được kế thừa từ lớp cha là User
5. Đa hình (polymorphism) là gì? Có những loại đa hình nào?
6. Sự khác biệt giữa abstract class và interface là gì?
7. Constructor và destructor là gì? Khi nào chúng được gọi?
8. Overriding và overloading khác nhau như thế nào?
9.  Access modifier (public, private, protected) là gì? Ảnh hưởng của chúng đến phạm vi truy cập?
10. Làm thế nào để thực hiện tính trừu tượng trong OOP?
11. Bạn đã từng sử dụng design pattern nào trong OOP chưa? Hãy kể tên và giải thích một mẫu bạn biết.
12. Làm sao để kiểm soát sự phụ thuộc giữa các class trong OOP?
13. SOLID là gì? Hãy giải thích từng nguyên lý.
14. Làm thế nào để kiểm thử các class trong OOP?
15. Khi nào nên sử dụng OOP thay vì lập trình thủ tục?

---

# Câu hỏi về các vấn đề thường gặp khi phát triển Web Application

1. Các vấn đề bảo mật phổ biến trong web application là gì? (VD: SQL Injection, XSS, CSRF...)
2. Làm sao để xác thực và phân quyền người dùng trong ứng dụng web?
3. Session và Cookie khác nhau như thế nào? Khi nào nên dùng từng loại?
4. Làm thế nào để xử lý upload file an toàn?
5. Bạn sẽ làm gì để tối ưu hiệu năng cho một web application?
6. Làm sao để xử lý lỗi và log lỗi trong ứng dụng web?
7. Các phương pháp bảo vệ dữ liệu người dùng là gì?
8. Làm thế nào để xây dựng RESTful API?
9. CORS là gì? Làm sao để xử lý vấn đề CORS?
10. Làm sao để kiểm thử và debug một web application?
11. Bạn sẽ triển khai ứng dụng web lên server như thế nào?
12. Làm sao để xử lý các vấn đề về concurrent request?
13. Làm thế nào để backup và phục hồi dữ liệu?
14. Làm sao để đảm bảo tính toàn vẹn và nhất quán của dữ liệu?
15. Bạn sẽ làm gì khi ứng dụng gặp sự cố nghiêm trọng (downtime, mất dữ liệu...)?
